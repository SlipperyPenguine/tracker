<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 13/04/2016
 * Time: 00:05
 */

namespace tracker\Repositories;


abstract class Repository
{
    public function getByID($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getBySubjectTypeAndID($subjectType, $subjectId)
    {
        return $this->model->where('subject_type', $subjectType)->where('subject_id', $subjectId)->get();
    }

    public function registerNew($attributes)
    {
        return $this->model->create($attributes);
    }

    public function saveChanges($model, $attributes)
    {
        return $model->update($attributes);
    }

}