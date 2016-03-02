<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"Change Request Title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter a title for the change request here</b> </label>
    </section>

    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('external_id', null, ['placeholder'=>"External Reference"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter a Bugzilla / Jira Reference here</b> </label>
    </section>

</fieldset>
<fieldset>
    <section>
        <div class="row">

            <div class="col col-6">
                <label class="label">Status</label>
                <label class="radio ">{!! Form::radio('status', 'Open', true) !!}<i></i>Open</label>
                <label class="radio ">{!! Form::radio('status', 'Complete', false) !!}<i></i>Complete</label>
                <label class="radio ">{!! Form::radio('status', 'Cancelled', false) !!}<i></i>Cancelled</label>
                <label class="radio ">{!! Form::radio('status', 'Rejected', false) !!}<i></i>Rejected</label>
            </div>
            <div class="col col-6">
                <label class="label">Ranking</label>
                <label class="radio ">{!! Form::radio('ranking', 4, true) !!}<i></i>Critical</label>
                <label class="radio ">{!! Form::radio('ranking', 3, false) !!}<i></i>High</label>
                <label class="radio ">{!! Form::radio('ranking', 2, false) !!}<i></i>Medium</label>
                <label class="radio ">{!! Form::radio('ranking', 1, false) !!}<i></i>Low</label>
            </div>

        </div>
    </section>
</fieldset>

<fieldset>


    <section>
        <label class="input"> <i class="icon-prepend fa fa-user"></i>
            {!! Form::text('sponsor', null, ['placeholder'=>"Sponsor"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter the business sponsor for the change request here</b> </label>
    </section>



    <label>Contact</label>
    <section>
        {!! Form::select('contact', isset($changerequest) ? [  $changerequest->contact => $changerequest->Contact->name] : [], isset($changerequest) ? $changerequest->contact :  null ,['class'=>"form-control", 'id'=>"contact"] ) !!}
    </section>



</fieldset>

<fieldset>

    <div class="row">

        <div class="col col-6">
            <section>
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    {!! Form::text('submission_date', isset($changerequest) ? $changerequest->submission_date->format('d F Y') : null, ['id'=>'submission_date', 'placeholder'=>"Submission Date"] ) !!}
                    <b class="tooltip tooltip-bottom-right">Submission Date</b> </label>
            </section>

            <section>
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    {!! Form::text('required_by', isset($changerequest) ? $changerequest->required_by->format('d F Y') : null, ['id'=>'required_by', 'placeholder'=>"Required By"] ) !!}
                    <b class="tooltip tooltip-bottom-right">Required By</b> </label>
            </section>
        </div>

        <div class="col col-6">
            <section>
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    {!! Form::text('implementation_date', isset($changerequest) ? $changerequest->implementation_date->format('d F Y') : null, ['id'=>'implementation_date', 'placeholder'=>"Implementation Date"] ) !!}
                    <b class="tooltip tooltip-bottom-right">Implementation Date</b> </label>
            </section>

            <section>
                <label class="input"> <i class="icon-prepend fa fa-clock-o"></i>
                    {!! Form::text('lead_time', null, ['placeholder'=>"Lead Time (days)"] ) !!}
                    <b class="tooltip tooltip-bottom-right">Enter the Lead Time in days</b> </label>
            </section>
        </div>


    </div>


</fieldset>

<fieldset>

    <div class="row">

        <div class="col col-6">

            <section>
                <label class="textarea">
                    {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
                    <b class="tooltip tooltip-top-left">Describe the Change request here</b>
                </label>
            </section>

            <section>
                <label class="textarea">
                    {!! Form::textarea('business_benefit', null, ['rows'=>'5','placeholder'=>"Business Benefit"] ) !!}
                    <b class="tooltip tooltip-top-left">Describe the business benefits of making the change</b>
                </label>
            </section>
        </div>

        <div class="col col-6">

            <section>
                <label class="textarea">
                    {!! Form::textarea('business_impact', null, ['rows'=>'5','placeholder'=>"Business Impact"] ) !!}
                    <b class="tooltip tooltip-top-left">Describe the business impact if the change is NOT implemented here</b>
                </label>
            </section>

            <section>
                <label class="textarea">
                    {!! Form::textarea('impact_analysis', null, ['rows'=>'5','placeholder'=>"Impact Analysis"] ) !!}
                    <b class="tooltip tooltip-top-left">Enter the impact analysis here.  To be finalized by the product manager</b>
                </label>
            </section>
        </div>

    </div>

</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>


@section('readyfunction')

    @include('ChangeRequests.partials.datefieldsetup')

    @include('ChangeRequests.partials.dropdownsetup')

    var $MyForm = $('#changerequestform').validate({
    // Rules for form validation
    rules : {
    title : {
    required : true
    },
    sponsor : {
    required : true
    },
    contact : {
    required : true
    },
    submission_date : {
    required : true
    },
    required_by : {
    required : true
    },
    implementation_date : {
    required : true
    },
    description : {
    required : true
    }
    },

    // Messages for form validation
    messages : {
    title : {
    required : 'Please enter a title for the change request'
    },
    sponsor : {
    required : 'Please enter the business sponsor'
    },
    contact : {
    required : 'Please enter the contact within the program for this change request'
    },
    submission_date : {
    required : 'Pleae select a submission date'
    },
    required_by : {
    required : 'Pleae select a date the change is required by'
    },
    implementation_date : {
    required : 'Pleae select the implementation date'
    },
    description : {
    required : 'Please enter a description'
    }
    },

    // Do not change code below
    errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
    }
    });



@endsection


