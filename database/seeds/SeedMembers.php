<?php

use Illuminate\Database\Seeder;
use tracker\Models\Member;

class SeedMembers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->delete();

        //program
        Member::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'user_id' => 3, 'role' => 'Program Lead' ));
        Member::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'user_id' => 2, 'role' => 'IS Lead' ));
        Member::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'user_id' => 6, 'role' => 'SRO' ));
        Member::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'user_id' => 7, 'role' => 'Lead Analyst' ));
        Member::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'user_id' => 8, 'role' => 'Change Lead' ));
        Member::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'user_id' => 9, 'role' => 'Finanical Controller' ));

        //planning workstream
        Member::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'user_id' => 4, 'role' => 'Stream Lead' ));
        Member::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'user_id' => 3, 'role' => 'BCM' ));

        //WSED
        Member::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'user_id' => 5, 'role' => 'Stream Lead' ));
        Member::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'user_id' => 11, 'role' => 'Planning BCM' ));
        Member::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'user_id' => 17, 'role' => 'Protocol BCM' ));
        Member::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'user_id' => 18, 'role' => 'Protocol BCM' ));

        //A&R
        Member::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'user_id' => 15, 'role' => 'Stream Lead' ));
        Member::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'user_id' => 19, 'role' => 'BCM' ));

        //Work Execution
        Member::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'user_id' => 4, 'role' => 'Stream Lead' ));
        Member::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'user_id' => 10, 'role' => 'BCM' ));

        //Logistics

        //IS Enablers
        Member::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'user_id' => 4, 'role' => 'Stream Lead' ));
        Member::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'user_id' => 16, 'role' => 'Design Lead' ));

        //PROJECTS
        Member::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'user_id' => 14, 'role' => 'Project Manager' ));
        Member::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'user_id' => 16, 'role' => 'Solution Architect' ));

        Member::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'user_id' => 5, 'role' => 'Project Manager' ));
        Member::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'user_id' => 16, 'role' => 'Solution Architect' ));

        Member::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 5, 'role' => 'Project Manager' ));
        Member::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 21, 'role' => 'Solution Architect' ));

        Member::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 14, 'role' => 'Project Manager' ));
        Member::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 21, 'role' => 'Solution Architect' ));
    }
}
