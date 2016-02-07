<?php

use Illuminate\Database\Seeder;
use tracker\Models\Project;

class SeedProjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();

        Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'Site Placement', 'Status' => 3,  'PI'=>'PI00012345', 'StartDate'=> date_create('04/01/2015'), 'EndDate'=> date_create('07/01/2016'), 'description' => 'Agree a global process for site placement and implement the appropriate tool to support the new process' ));
        Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'Protocol', 'Status' => 3,  'PI'=>'PI00012347', 'StartDate'=> date_create('06/01/2015'), 'EndDate'=> date_create('07/01/2016'), 'description' => 'Drive the changes required to implement no protocol no trial.  New IS tool that will be the repositiory for all future protocols' ));
        Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'System Integration', 'Status' => 3, 'PI'=>'PI00012343', 'StartDate'=> date_create('06/01/2015'), 'EndDate'=> date_create('04/01/2016'), 'description' => 'Implement a new system integration service based on BizTalk as the integration technology' ));
        Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'FPLS Gaps', 'Status' => 3,  'PI'=>'PI00012338', 'StartDate'=> date_create('01/01/2016'), 'EndDate'=> date_create('07/01/2016'), 'description' => 'Ensure all the functionality still required by users is still available when we decommission FPLS' ));

        Project::create(array('program_id' => 1, 'work_stream_id' => 3 ,'name' => 'Data Model', 'Status' => 2, 'PI'=>'PI00012355', 'StartDate'=> date_create('06/01/2015'), 'EndDate'=> date_create('03/01/2016'), 'description' => 'Create a logical data model for future trialing data' ));

    }
}
