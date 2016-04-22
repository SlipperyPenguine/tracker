<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 13/04/2016
 * Time: 00:03
 */

namespace tracker\Repositories;


use tracker\Models\Decision;

class DecisionRepository extends Repository
{
    /**
     * @var Decision
     */
    protected $model;

    /**
     * DecisionRepository constructor.
     */
    public function __construct(Decision $model)
    {
        $this->model = $model;
    }

    public function getMeetingDecisions($meeting_id)
    {
        return $this->model->ForMeeting($meeting_id)->get();
    }


}