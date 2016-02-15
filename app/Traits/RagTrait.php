<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


use tracker\Models\rag;

trait RagTrait
{

    public function RAGs()
    {
        return $this->hasMany('tracker\Models\rag', 'subject_id', 'id')->where('subject_type', $this->subjecttype);
    }
    

    protected function AddStandardRAGs()
    {
        rag::create(array('subject_id' => $this->id, 'subject_type' => $this->subjecttype ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => $this->subjecttype ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => $this->subjecttype ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => $this->subjecttype ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => $this->subjecttype ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => $this->subjecttype ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => $this->subjecttype ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));
    }


}