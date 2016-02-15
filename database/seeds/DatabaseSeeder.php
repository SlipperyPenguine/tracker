<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SeedUsers::class);
        $this->call(SeedPrograms::class);
        $this->call(SeedWorkStreams::class);
        $this->call(SeedProjects::class);
        $this->call(SeedRags::class);
        $this->call(SeedRisks::class);
        $this->call(SeedMembers::class);
        $this->call(SeedTasks::class);
        $this->call(SeedComments::class);
        $this->call(SeedActions::class);

        Model::reguard();
    }
}
