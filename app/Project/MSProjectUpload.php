<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 13/03/2016
 * Time: 09:54
 */

namespace tracker\Project;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use tracker\Helpers\Breadcrumbs;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\Task;
use tracker\Models\WorkStream;

class MSProjectUpload
{
    public function OpenLoadForm($projectID)
    {
        //get the project
        try
        {
            $project = Project::findOrFail($projectID);
        }
        catch(ModelNotFoundException $e)
        {
            abort(404, "Project with the id $projectID not found");
        }

        $program = Program::findOrFail($project->program_id);
        $workstream = WorkStream::findOrFail($project->work_stream_id);

        return view('Project.UploadMicrosoftProjectPlan', compact('project', 'workstream', 'program'));

    }

    public function ParseFile($projectid, $file)
    {
        //get the file, convert to an array
        $arrayofimportedtasks = $this->ProcessImportedProjectFile($file);

        //get collection of tasks currently imported for this project
        $dbtasks = Task::where('subject_type', 'Project')
                            ->where('subject_id', $projectid)
                            ->where('imported', 1)
                            ->orderBy('sequence')
                            ->get();

        //save array to a session variable
       session(['msimportarray' => $arrayofimportedtasks]);

        //put the tasks into a tree structure
        $output = $this->GenerateHTMLOutput($arrayofimportedtasks, $dbtasks);

        return $output;
    }

    public function ProcessTheParsedFile($projectid)
    {
        $array = session('msimportarray');

        //delete all previously imported items for this project
        $affected = DB::table('tasks')
            ->where('subject_type', '=', 'Project')
            ->where('subject_id', '=', $projectid)
            ->where('imported', '=', 1)
            ->delete();

        //loop through and add the records
        $donearray = array();
        $seq = 1;
        $parentUID = 0;

        foreach($array as $mainitem)
        {
            foreach ($mainitem as $item)
            {
                //check if already added
                if (isset($donearray[$item['UID']]))
                {
                    $parentUID = $item['UID'];
                    continue;
                }


                $task = new Task();

                $task->imported = 1;
                $task->subject_id = $projectid;
                $task->subject_type = 'Project';
                $task->subject_name = Breadcrumbs::getSubjectName($task->subject_type, $task->subject_id);
                $task->status = 'Open';
                $task->flag1 = $item['flag1'];
                $task->created_by = auth()->user()->id;
                $task->action_owner = auth()->user()->id;
                $task->title = $item['Name'];
                $task->description = 'Imported from MS Project';
                if( $item['Milestone'] == '1')
                {
                    $task->milestone = 1;
                    $task->StartDate = Carbon::parse($item['Finish'])->toDateTimeString();
                    $task->EndDate = null;
                }
                else
                {
                    $task->milestone = 0;
                    $task->StartDate = Carbon::parse($item['Start'])->toDateTimeString();
                    $task->EndDate = Carbon::parse($item['Finish'])->toDateTimeString();
                }

                $task->sequence = $seq;
                $task->UID = $item['UID'];
                $task->outlinenumber = $item['OutlineNumber'];
                $task->PercentComplete = $item['PercentComplete'];

                if ($item['OutlineLevel'] > 1)
                {
                    //is a child
                    $task->parentUID = $parentUID;
                }

                $task->save();

                $donearray[$item['UID']] = 1;

                $parentUID = $item['UID'];
                $seq++;


            }
        }

        //return $array;

        flash()->success('Success', "Tasks imported successfully from the MS Project File");

        return redirect()->action('TaskController@indexTask', ['Project', $projectid]);

    }

    private function ProcessImportedProjectFile($file)
    {
        $xml = simplexml_load_file($file->getRealPath());
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);

        //put the tasks into a collection
        $collect = collect($array['Tasks']['Task']);

        //select the tasks with the flag set
        $flag1tasks = $collect->where('ExtendedAttribute.Value', '1');

        if ($flag1tasks->count() == 0)
            $flag1tasks = $collect->where('ExtendedAttribute.0.Value', '1');

        //build the heirarchy of tasks needed
        $newarrayforfun = array();

        foreach ($flag1tasks as $flag1task) {
            $taskitem = array();

            $outline = $flag1task['OutlineNumber'];
            $outlinearray = explode('.', $outline);

            while (count($outlinearray) > 0) {
                $task = array();

                $targetoutline = implode('.', $outlinearray);
                $targettask = $collect->where('OutlineNumber', $targetoutline)->first();
                $task['OutlineNumber'] = $targettask['OutlineNumber'];
                $task['UID'] = $targettask['UID'];
                $task['Name'] = $targettask['Name'];
                $task['OutlineLevel'] = $targettask['OutlineLevel'];
                $task['Start'] = $targettask['Start'];
                $task['Finish'] = $targettask['Finish'];
                $task['Milestone'] = $targettask['Milestone'];
                $task['PercentComplete'] = $targettask['PercentComplete'];
                if (isset($targettask['ExtendedAttribute']))
                    $task['flag1'] = 1;
                else
                    $task['flag1'] = 0;
                $taskitem[] = $task;

                $pop = array_pop($outlinearray);
            }

            //add flag1 marker to top task
            //$taskitem[0]['flag1'] = 1;
            $taskitem = array_reverse($taskitem);
            $newarrayforfun[] = $taskitem;
        }

        return $newarrayforfun;

    }

    /**
     * @param $arrayOfImportedTasks
     *
     * @return string
     */
    private function GenerateHTMLOutput($arrayOfImportedTasks, $dbtasks)
    {

        $output = $this->GenerateFileParseHeader();
        $output .= $this->GenerateFileParseContent($arrayOfImportedTasks, $dbtasks);
        $output .= $this->GenerateFileParseFooter();

        $output .= $this->GenerateDBHeader();
        $output .= $this->GenerateDBContent($dbtasks, $arrayOfImportedTasks);
        $output .= $this->GenerateDBFooter();

        return $output;
    }

    /**
     * @return string
     */
    private function GenerateFileParseHeader()
    {
        $output = '<article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">';
        $output .= '<div class="jarviswidget jarviswidget-color-darken" id="wid-id-projectimport" data-widget-editbutton="false" data-widget-deletebutton="false">';

        $output .= '<header>';
        $output .= '<span class="widget-icon"> <i class="fa fa-cloud-upload"></i> </span>';
        $output .= '<h2>Project File Contents</h2>';

        $output .= '</header>';
        $output .= '<div>';
        $output .= '<div class="widget-body">';

        $output .= '<div class="tree smart-form">';
        $output .= '    <ul>';
        return $output;
    }

    /**
     * @param $arrayOfImportedTasks
     * @param $output
     *
     * @return string
     */
    private function GenerateFileParseContent($arrayOfImportedTasks, $dbtasks)
    {
//do first item
        $firstitem = $arrayOfImportedTasks[0];

        $output = "";

        $current_depth = 0;
        $itemdepth = count($firstitem);

        for ($i = 0; $i < $itemdepth; $i++) {
            $textfont = 'txt-color-green';
            if($dbtasks->contains('UID', $firstitem[$i]['UID'] ))
            {
                $textfont = 'txt-color-blue';
            }

            $output .= '    <li>';
            if ($i == ($itemdepth - 1))
                $output .= '    <span class="text-bold '.$textfont.'"><i class="icon-leaf"></i> ' . $firstitem[$i]['UID'] . ' - ' . $firstitem[$i]['Name'] . '</span> </li>';
            else {
                $output .= '    <span class="'.$textfont.'"><i class="fa fa-lg fa-minus-circle"></i> ' . $firstitem[$i]['UID'] . ' - ' . $firstitem[$i]['Name'] . '</span>';
                $output .= ' <ul> ';
                $current_depth++;
            }

        }

        $itemcount = count($arrayOfImportedTasks);
        for ($i = 1; $i < $itemcount; $i++) {
            $workingitem = $arrayOfImportedTasks[$i];
            $previousitem = $arrayOfImportedTasks[$i - 1];
            $itemdepth = count($workingitem);

            //number of items that might need closing,  Don't include the leaf from the previous item as that is already close
            $nodestoclose = count($previousitem) - 1;
            for ($x = 0; $x < $itemdepth - 1; $x++) {
                if (isset($previousitem[$x]) && ($previousitem[$x]['UID'] == $workingitem[$x]['UID'])) {
                    $nodestoclose--;
                } else {
                    //found something that doesn't match so can break out of current for loop
                    break;
                }
            }

            //close nodes
            if ($nodestoclose > 0) {
                for ($x = 1; $x <= $nodestoclose; $x++) {
                    $output .= ' </ul> </li>';
                    $current_depth--;
                }
            }


            for ($x = 0; $x < $itemdepth; $x++) {
                if (isset($previousitem[$x]) && ($previousitem[$x]['UID'] == $workingitem[$x]['UID'])) {
                    //already have this one so can skip it
                    continue;
                } else {

                    $textfont = 'txt-color-green';
                    if($dbtasks->contains('UID', $workingitem[$x]['UID'] ))
                    {
                        $textfont = 'txt-color-blue';
                    }

                    //this is a new one so add the item
                    $output .= '    <li>';
                    if ($x == ($itemdepth - 1))
                        $output .= '    <span class="text-bold '.$textfont.'"><i class="icon-leaf"></i> ' . $workingitem[$x]['UID'] . ' - ' . $workingitem[$x]['Name'] . '</span> </li>';
                    else {
                        $output .= '    <span class="'.$textfont.'"><i class="fa fa-lg fa-minus-circle"></i> ' . $workingitem[$x]['UID'] . ' - ' . $workingitem[$x]['Name'] . '</span>';
                        $output .= ' <ul> ';
                        $current_depth++;
                    }

                }
            }


        }

        //close out the line items
        for ($i = 0; $i < $current_depth; $i++) {

            $output .= ' </ul> </li>';
        }
        return $output;
    }

    /**
     * @param $output
     *
     * @return string
     */
    private function GenerateFileParseFooter()
    {
        $output = ' </ul> </div>';

        $output .= '<hr/>';
        $output .= '<form method="post" > ';
        $output .= csrf_field();
        $output .= '<button style="height: 32px" type="submit" class="btn btn-primary">';
        $output .= 'Save Changes';
        $output .= '</button>';
        $output .= '</form>';

        //close widget body
        $output .= '</div>';

        //close main divbelow header
        $output .= '</div>';

        //close widget div
        $output .= '</div>';

        //close the project tree article
        $output .= '</article>';
        return $output;
    }

    /**
     * @return string
     */
    private function GenerateDBHeader()
    {
        $output = '<article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">';
        $output .= '<div class="jarviswidget jarviswidget-color-darken" id="wid-id-db" data-widget-editbutton="false" data-widget-deletebutton="false">';

        $output .= '<header>';
        $output .= '<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>';
        $output .= '<h2>Current Tasks</h2>';

        $output .= '</header>';
        $output .= '<div>';
        $output .= '<div class="widget-body">';

        $output .= '<div class="tree smart-form">';
        $output .= '    <ul>';
        return $output;
    }

    /**
     * @param $output
     *
     * @return string
     */
    private function GenerateDBFooter()
    {
        $output = ' </ul> </div>';

        //close widget body
        $output .= '</div>';

        //close main divbelow header
        $output .= '</div>';

        //close widget div
        $output .= '</div>';

        //close the project tree article
        $output .= '</article>';
        return $output;
    }

    private function GenerateDBContent($dbtasks, $arrayOfImportedTasks)
    {
        $output = '';
        $currentlevel = 0;

        $counttasks = $dbtasks->count();

        if ($counttasks==0)
        {
            return '';
        }

        for($i=0;$i<$counttasks;$i++)
        {
            $leafnode = false;
            $tasklevel = substr_count($dbtasks[$i]->outlinenumber, '.')+1;
            $nexttasklevel = 0;
            $prevlevel = 1;
            //check if last item
            if($i==($counttasks-1))
            {
                $leafnode = true;
            }
            else
            {
                $nexttasklevel = substr_count($dbtasks[$i+1]->outlinenumber, '.')+1;
                if($nexttasklevel<=$tasklevel)
                {
                    $leafnode = true;
                }
            }

            if($i>0)
            {
                $prevlevel  = substr_count($dbtasks[$i-1]->outlinenumber, '.')+1;
            }

            //if previous level is less than this one then we need to create a new list
            if($tasklevel>$prevlevel) {
                $output .= ' <ul> <li>';
            }
            elseif($tasklevel==$prevlevel) {
                //same level so no ul needed
                $output .= ' </li> <li>';
            }
            else
            {
                //this level is less than the previous level
                while($tasklevel<$prevlevel)
                {
                    $output .= ' </li> </ul>';
                    $prevlevel--;
                }
                $output .= ' <li>';
            }

            //if previous level less than current level we need to close some off

            $textfont = 'txt-color-red';
            if($this->searchNestedArray($arrayOfImportedTasks, $dbtasks[$i]['UID'] ) )
            {
                $textfont = 'txt-color-blue';
            }


            //if leaf node
            if($leafnode) {
                $output .= ' <span class="text-bold '.$textfont.'"><i class="icon-leaf"></i> ' . $dbtasks[$i]['UID'] . ' - ' . $dbtasks[$i]['title'] . '</span>';
            }
            else {
                $output .= '    <span class="'.$textfont.'"><i class="fa fa-lg fa-minus-circle"></i> ' . $dbtasks[$i]['UID'] . ' - ' . $dbtasks[$i]['title'] . '</span>';
            }

        }

        //finally close off the levels that are not yet finished
        $level  = substr_count($dbtasks[$counttasks-1]->outlinenumber, '.')+1;

        while($level>0)
        {
            $output .= ' </li> </ul>';
            $level--;
        }

        return $output;



    }

    private function searchNestedArray(array $array, $search, $mode = 'value') {

        foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($array)) as $key => $value) {
            if ($search === ${${"mode"}})
                return true;
        }
        return false;
    }
}