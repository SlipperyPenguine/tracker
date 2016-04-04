<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 31/03/2016
 * Time: 17:27
 */

namespace tracker\Helpers;


use tracker\Models\Action;
use tracker\Models\ChangeRequest;
use tracker\Models\Dependency;
use tracker\Models\Meeting;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\rag;
use tracker\Models\Risk;
use tracker\Models\Task;
use tracker\Models\WorkStream;

class ObjectFinder
{
    public static function GetObject($subject_type, $subject_id)
    {
        switch($subject_type)
        {
            case 'Program':
                return Program::findorFail($subject_id);
                break;
            case 'WorkStream':
                return WorkStream::findorFail($subject_id);
                break;
            case 'Project':
                return Project::findorFail($subject_id);
                break;
            case 'Risk':
                return Risk::findorFail($subject_id);
                break;
            case 'Task':
                return Task::findorFail($subject_id);
                break;
            case 'Action':
                return Action::findorFail($subject_id);
                break;
            case 'Rag':
                return rag::findorFail($subject_id);
                break;
            case 'Dependency':
                return Dependency::findorFail($subject_id);
                break;
            case 'ChangeRequest':
                return ChangeRequest::findorFail($subject_id);
                break;
            case 'Meeting':
                return Meeting::findorFail($subject_id);
                break;
        }
    }
}