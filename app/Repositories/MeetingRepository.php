<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 13/04/2016
 * Time: 00:53
 */

namespace tracker\Repositories;


use tracker\Helpers\ObjectFinder;
use tracker\Models\Meeting;
use tracker\Traits\MeetingTrait;

class MeetingRepository extends Repository
{

    /**
     * @var Meeting
     */
    protected $model;

    /**
     * ActionRepository constructor.
     */
    public function __construct(Meeting $model)
    {
        $this->model = $model;
    }

    /**
     * @param $subjectType
     * @param $subjectId
     *
     * override of the base class method
     *
     * @return mixed
     */
    public function getBySubjectTypeAndID($subjectType, $subjectId)
    {
        //check if the parent has the meetings trait
        $parent = ObjectFinder::GetObject($subjectType, $subjectId);

        //$meetings = null;
        $meetings = [];

        //check if paret not found by the object finder
        if(!$parent)
            return null;

        if (in_array(MeetingTrait::class, class_uses($parent)))
        {
            //$meetings = $parent->Meetings->all();
            $meetings = $parent->Meetings->lists('title', 'id');

            //if (count($meetings) > 0)
                $meetings[-1] = 'Select a meeting';
            //else
            //    $meetings = null;
            return $meetings;
        }
        else
            return null;


     }
}