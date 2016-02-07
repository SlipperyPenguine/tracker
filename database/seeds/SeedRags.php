<?php

use Illuminate\Database\Seeder;
use tracker\Models\rag;

class SeedRags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rags')->delete();

        rag::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'WorkStream' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));

        rag::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'title' => 'Resource', 'value' => 'A', 'comments' => 'Integration and FPLS Gaps project manager is leaving' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'title' => 'Schedule', 'value' => 'G', 'comments' => 'Current plans are in line with the agreed July target date' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'title' => 'Costs', 'value' => 'G', 'comments' => 'No Change' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'title' => 'Quality', 'value' => 'G', 'comments' => 'No quality issues' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'title' => 'Risks & Issues', 'value' => 'A', 'comments' => 'Still need to confirm the details of the location model' ));

        rag::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'WorkStream' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));

        rag::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'WorkStream' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));

        rag::create(array('subject_id' => 5, 'subject_type' => 'WorkStream' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'WorkStream' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'WorkStream' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'WorkStream' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'WorkStream' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'WorkStream' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'WorkStream' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));

        rag::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 6, 'subject_type' => 'WorkStream' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));


        //projects
        rag::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'title' => 'Schedule', 'value' => 'A', 'comments' => 'No contigency' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));

        rag::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'title' => 'Resource', 'value' => 'A', 'comments' => 'Change in PM and Analyst' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'title' => 'Schedule', 'value' => 'A', 'comments' => 'Need decision on SPIRIT integration' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'title' => 'Risks & Issues', 'value' => 'A', 'comments' => 'Concerns on the risks' ));

        rag::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'title' => 'Infrastructure', 'value' => 'A', 'comments' => 'Pre prod and prod delayed' ));
        rag::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));

        rag::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'title' => 'Resource', 'value' => 'R', 'comments' => 'PM left' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'title' => 'Schedule', 'value' => 'A', 'comments' => 'Lack of clarity at this stage' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));

        rag::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));
    }
}
