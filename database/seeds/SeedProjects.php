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


        /* 1  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_Protocol Pilot', 'Status' => 7,  'PI'=>'PI0012823', 'StartDate'=> date_create('11/01/2014'), 'EndDate'=> date_create('10/01/2015'), 'description' => 'Protocol Pilot' ));
        /* 2  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_Comprehensive Protocol Solution', 'Status' => 7,  'PI'=>'PI0013123', 'StartDate'=> date_create('01/01/2015'), 'EndDate'=> date_create('09/15/2015'), 'description' => 'Agree a global process for site placement and implement the appropriate tool to support the new process' ));
        /* 3  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_Site Placement Implementation', 'Status' => 5,  'PI'=>'PI0013341', 'StartDate'=> date_create('06/01/2015'), 'EndDate'=> date_create('07/01/2016'), 'description' => 'Implement site placement in BioPlan' ));
        /* 4  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_Protocol Implementation', 'Status' => 5,  'PI'=>'PI0013340', 'StartDate'=> date_create('06/18/2015'), 'EndDate'=> date_create('07/01/2016'), 'description' => 'Implement globabl protocol solution including new tool' ));
        /* 5  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_System Integration Service and Governance', 'Status' => 5,  'PI'=>'PI0012969', 'StartDate'=> date_create('04/01/2015'), 'EndDate'=> date_create('04/01/2016'), 'description' => 'Biztalk based integration service' ));
        /* 6  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_Data Transport POC', 'Status' => 7,  'PI'=>'PI0012865', 'StartDate'=> date_create('01/01/2015'), 'EndDate'=> date_create('01/01/2016'), 'description' => 'Produce report recommending how to support our data movement needs' ));
        /* 7  */ Project::create(array('program_id' => 1, 'work_stream_id' => 6 ,'name' => 'OB P2_Data Transport Implementation', 'Status' => 0,  'PI'=>'', 'StartDate'=> date_create('07/01/2016'), 'EndDate'=> date_create('05/01/2017'), 'description' => 'Implement a data transport mechanism' ));
        /* 8  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_FPLS Gaps solution', 'Status' => 5,  'PI'=>'PI0013810', 'StartDate'=> date_create('07/01/2015'), 'EndDate'=> date_create('07/01/2016'), 'description' => 'Resolve gaps in functionality that are in FPLS but not covered by protocol or site placement' ));
        /* 9  */ Project::create(array('program_id' => 1, 'work_stream_id' => 2 ,'name' => 'OB P2_One Biology Portal', 'Status' => 5,  'PI'=>'PI0011059', 'StartDate'=> date_create('07/01/2015'), 'EndDate'=> date_create('05/01/2016'), 'description' => 'User Experience Platform' ));

        /* 10 */ Project::create(array('program_id' => 1, 'work_stream_id' => 3 ,'name' => 'OB P2_Analytics & Reporting tools Pilot', 'Status' => 5,  'PI'=>'PI0013342', 'StartDate'=> date_create('07/01/2015'), 'EndDate'=> date_create('03/31/2016'), 'description' => 'This is a pilot' ));
        /* 11 */ Project::create(array('program_id' => 1, 'work_stream_id' => 3 ,'name' => 'OB P2_Trial Data Accessibility project', 'Status' => 5,  'PI'=>'PI0013343', 'StartDate'=> date_create('07/01/2015'), 'EndDate'=> date_create('03/31/2016'), 'description' => 'This is a POC' ));
        /* 12 */ Project::create(array('program_id' => 1, 'work_stream_id' => 3 ,'name' => 'Trialing Data Structure Project', 'Status' => 5,  'PI'=>'PI0013703', 'StartDate'=> date_create('07/01/2015'), 'EndDate'=> date_create('03/01/2016'), 'description' => 'This is a POC' ));
        /* 13 */ Project::create(array('program_id' => 1, 'work_stream_id' => 3 ,'name' => 'OB P2_Common Language Delivery', 'Status' => 5,  'PI'=>'PI0012970', 'StartDate'=> date_create('05/01/2015'), 'EndDate'=> date_create('01/01/2016'), 'description' => 'Implement a new process for agreeing common language' ));
        /* 14 */ Project::create(array('program_id' => 1, 'work_stream_id' => 3 ,'name' => 'OB P2_Legacy Trialing Data Migration Proposal Project', 'Status' => 5,  'PI'=>'PI0013344', 'StartDate'=> date_create('07/01/2015'), 'EndDate'=> date_create('03/01/2016'), 'description' => 'This is a POC' ));



    }
}
