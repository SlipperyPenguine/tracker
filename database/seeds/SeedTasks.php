<?php

use Illuminate\Database\Seeder;
use tracker\Models\Task;

class SeedTasks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();


        Task::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('03/01/2016'), 'title' => 'System Integration Service ready to use',   'description' => 'The system integration service is required for all integrations across the platform. This needs to be in place by March to enable development and testing' ));
        Task::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('04/06/2016'), 'title' => 'Change impact assessments complete',   'description' => 'Need to have a clear idea of the change impact to ensure BCMs have focus on readying R&D for the new process and tools' ));

    }
}
