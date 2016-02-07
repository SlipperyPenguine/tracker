<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use tracker\Models\Program;

class SeedPrograms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->delete();

        Program::create(array('name' => 'One Biology', 'Status' => 0, 'RAG' => 'G', 'StartDate'=> date_create('01/05/2010'), 'EndDate'=> date_create('01/01/2018'),  'description' => 'One Biology R&D change program to deliver the future trialing processes, ways of working and tools' ));
        Program::create(array('name' => 'MINT', 'Status' => 0, 'RAG' => 'A', 'StartDate'=> date_create('01/02/2009'), 'EndDate'=> date_create('01/01/2017'), 'description' => 'Material Identity aNd Tracking R&D change program' ));
    }
}
