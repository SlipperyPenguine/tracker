<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use tracker\Models\User;

class SeedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        /*  1 */ User::create(array('email' => 'admin@tracker.com', 'password' => bcrypt('changeme'), 'name' => 'admin', 'superUser' => true ));
        /*  2 */ User::create(array('email' => 'john.booth@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'John Booth', 'superUser' => true ));
        /*  3 */ User::create(array('email' => 'tanya.wright@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Tanya Wright' ));
        /*  4 */ User::create(array('email' => 'peter.munro@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Pete Munro' ));
        /*  5 */ User::create(array('email' => 'peki.anim@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Peki Anim' ));
        /*  6 */ User::create(array('email' => 'stuart.harrison@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Stuart Harrisson' ));
        /*  7 */ User::create(array('email' => 'andy.clyne@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Andy Clyne' ));
        /*  8 */ User::create(array('email' => 'Liz.harrisonturtle@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Liz Harrisson-Turtle' ));
        /*  9 */ User::create(array('email' => 'stephen.wemyss@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Steve Wemyss', 'superUser' => true ));
        /* 10 */ User::create(array('email' => 'matt.faletti@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Matt Faletti' ));
        /* 11 */ User::create(array('email' => 'karla.smeja@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Karla Smeja' ));
        /* 12 */ User::create(array('email' => 'sarah.neville@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Sarah Neville', 'superUser' => true ));
        /* 13 */ User::create(array('email' => 'stefan.haberberg@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Stefan Haberberg', 'superUser' => true ));
        /* 14 */ User::create(array('email' => 'Sally.puller@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Sally Puller' ));
        /* 15 */ User::create(array('email' => 'Rich.burr@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Rich Burr' ));
        /* 16 */ User::create(array('email' => 'john.fox@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'John Fox' ));
        /* 17 */ User::create(array('email' => 'mike.johnson@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Mike Johnson' ));
        /* 18 */ User::create(array('email' => 'charlie.tasker@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Charlie Tasker' ));
        /* 19 */ User::create(array('email' => 'Robert.wurtz@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Robert Wurtz' ));
        /* 20 */ User::create(array('email' => 'Lukas.schmutz@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Lukas Schmutz' ));
        /* 21 */ User::create(array('email' => 'nasir.akhtar@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Nasir Akhtar' ));
        /* 22 */ User::create(array('email' => 'avinash.dixit@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Avinash Dixit' ));
        /* 23 */ User::create(array('email' => 'atul.ganatra@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Atul Ganatra' ));
        /* 24 */ User::create(array('email' => 'zaheer.mirza@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Zaheer Mirza' ));
        /* 25 */ User::create(array('email' => 'dan.harwood@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Dan Harwood' ));
        /* 26 */ User::create(array('email' => 'julia.hadley@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Julia Hadley' ));
        /* 27 */ User::create(array('email' => 'rachael_olivia.jones@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Rachael Olivia Jones' , 'superUser' => true ));
        /* 28 */ User::create(array('email' => 'lauriane.cotter@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Lauriane Cotter' ));
        /* 29 */ User::create(array('email' => 'charles.wickenden@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Charles Wickenden' ));
        /* 30 */ User::create(array('email' => 'elain.fairfax@syngenta.com', 'password' => bcrypt('changeme'), 'name' => 'Elaine Fairfax', 'superUser' => true ));


    }
}
