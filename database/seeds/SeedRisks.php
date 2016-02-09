<?php

use Illuminate\Database\Seeder;
use tracker\Models\Risk;

class SeedRisks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risks')->delete();

        Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'previous_probability'=>1, 'impact' => 3, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2 , 'title' => 'Flowers and Veg Seeds', 'description' => 'Flowers and Veg may be brought back in scope now the divestment is cancelled' ));

        Risk::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'status' => 'Open', 'probability' => 1, 'previous_probability'=>2, 'impact' => 3, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2 , 'title' => 'Environments', 'description' => 'There may be a delay in the environments being ready in production' ));
        Risk::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Key Resources Leaving', 'description' => 'Losing both Neil and Marcin' ));

        Risk::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

        Risk::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

        Risk::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

        Risk::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

    }
}
