<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 13/04/2016
 * Time: 00:03
 */

namespace tracker\Repositories;


use tracker\Models\Assumption;

class AssumptionRepository extends Repository
{
    /**
     * @var Decision
     */
    protected $model;

    /**
     * DecisionRepository constructor.
     */
    public function __construct(Assumption $model)
    {
        $this->model = $model;
    }

    public function getMeetingAssumptions($meeting_id)
    {
        return $this->model->ForMeeting($meeting_id)->get();
    }


}