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

        Task::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('06/01/2015'), 'title' => 'Gate 1',   'description' => 'BCM Gate 1' ));
        Task::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('10/01/2015'), 'title' => 'Review 1',   'description' => 'BCM Review 1' ));
        Task::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('01/01/2016'), 'title' => 'Gate 2',   'description' => 'BCM Gate 2' ));
        Task::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('07/01/2016'), 'title' => 'Gate 3',   'description' => 'BCM Gate 3 Go Live' ));

        Task::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('07/01/2015'), 'title' => 'Gate 1',   'description' => 'BCM Gate 1' ));
        Task::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('11/01/2015'), 'title' => 'Review 1',   'description' => 'BCM Review 1' ));
        Task::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('02/01/2016'), 'title' => 'Gate 2',   'description' => 'BCM Gate 2' ));
        Task::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('07/01/2016'), 'title' => 'Gate 3',   'description' => 'BCM Gate 3 Go Live' ));

        Task::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('05/01/2015'), 'title' => 'Gate 1',   'description' => 'BCM Gate 1' ));
        Task::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('09/01/2015'), 'title' => 'Review 1',   'description' => 'BCM Review 1' ));
        Task::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('10/01/2015'), 'title' => 'Gate 2',   'description' => 'BCM Gate 2' ));
        Task::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('03/01/2016'), 'title' => 'Gate 3',   'description' => 'BCM Gate 3 Go Live' ));

        Task::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('11/01/2015'), 'title' => 'Gate 1',   'description' => 'BCM Gate 1' ));
        Task::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('03/01/2016'), 'title' => 'Review 1',   'description' => 'BCM Review 1' ));
        Task::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('04/01/2016'), 'title' => 'Gate 2',   'description' => 'BCM Gate 2' ));
        Task::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'milestone' => '1', 'created_by' => '2', 'action_owner' => '2', 'StartDate'=> date_create('07/01/2016'), 'title' => 'Gate 3',   'description' => 'BCM Gate 3 Go Live' ));

    }
}
