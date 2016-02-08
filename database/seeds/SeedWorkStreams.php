<?php

use Illuminate\Database\Seeder;
use tracker\Models\WorkStream;

class SeedWorkStreams extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_streams')->delete();

        WorkStream::create(array('program_id' => 1,'name' => 'Planning', 'Status' => 2, 'phase'=>'1', 'RAG' => 'G', 'StartDate'=> date_create('05/01/2010'), 'EndDate'=> date_create('01/06/2015'), 'description' => 'Implementation of Functional Planning including BioPlan' ));
        WorkStream::create(array('program_id' => 1,'name' => 'Work Scheduling and Experimental Design', 'Status' => 0, 'phase'=>'2B', 'RAG' => 'A', 'StartDate'=> date_create('01/01/2015'), 'EndDate'=> date_create('07/01/2016'), 'description' => 'Protocol and Site Placement plus other projects to enable these and put FPLS beyond use' ));
        WorkStream::create(array('program_id' => 1,'name' => 'Analysis and Reporting', 'Status' => 0, 'phase'=>'2B', 'RAG' => 'G', 'StartDate'=> date_create('01/05/2015'), 'EndDate'=> date_create('05/01/2017'), 'description' => 'Implement changes required for the analysis and reporting processes' ));
        WorkStream::create(array('program_id' => 1,'name' => 'Work Execution', 'Status' => 1, 'RAG' => 'G', 'phase'=>'2C', 'StartDate'=> date_create('03/01/2016'), 'EndDate'=> date_create('01/01/2018'), 'description' => 'All things related to the establishment, execution and clean up of trials' ));
        WorkStream::create(array('program_id' => 1,'name' => 'Logistics', 'Status' => 1, 'RAG' => 'G', 'phase'=>'2C', 'StartDate'=> date_create('10/01/2015'), 'EndDate'=> date_create('01/01/2018'),'description' => 'The logistics activities required to support the planning and execution of trialing activities' ));
        WorkStream::create(array('program_id' => 1,'name' => 'BA IS Backbone', 'Status' => 1, 'RAG' => 'G', 'phase'=>'2C', 'StartDate'=> date_create('05/01/2015'), 'EndDate'=> date_create('01/01/2017'), 'description' => 'IS enablers required to ensure a robust and scalable IS platform that will meet R&D needs today and in the future' ));
     }
}
