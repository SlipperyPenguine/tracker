<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 13/04/2016
 * Time: 00:03
 */

namespace tracker\Repositories;


use tracker\Models\Action;

class ActionRepository extends Repository
{
    /**
     * @var Action
     */
    protected $model;

    /**
     * ActionRepository constructor.
     */
    public function __construct(Action $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with('Actionee')->get();
    }

    public function getMeetingActions($meeting_id)
    {
        return $this->model->ForMeeting($meeting_id)->get();
    }


}