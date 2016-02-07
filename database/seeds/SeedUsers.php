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

        User::create(array('email' => 'admin@tracker.com', 'password' => bcrypt('admin'), 'name' => 'admin', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'john.booth@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'John Booth', 'superUser' => true, 'avatar'=>'\\img\\avatars\\JohnBoothProfile.jpg' ));
        User::create(array('email' => 'tanya.wright@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Tanya Wright', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'peter.munro@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Pete Munro', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'peki.anim@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Peki Anim', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'stuart.harrison@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Stuart Harrisson', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));

        User::create(array('email' => 'andy.clyne@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Andy Clyne', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'Liz.harrisonturtle@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Liz Harrisson-Turtle', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'Steve.wemyss@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Steve Wemyss', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'matt.faletti@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Matt Faletti', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'karla.smeja@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Karla Smeja', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'sarah.neville@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Sarah Neville', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'stefan.hab@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Stefan Haberberg', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'Sally.puller@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Sally Puller', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'Rich.burr@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Rich Burr', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'john.fox@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'John Fox', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'mike.johnson@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Mike Johnson', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'charlie.tasker@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Charlie Tasker', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'Robert.wurtz@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Robert Wurtz', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));
        User::create(array('email' => 'Lukas.schmutz@syngenta.com', 'password' => bcrypt('admin'), 'name' => 'Lukas Schmutz', 'superUser' => true, 'avatar'=>'\\img\\avatars\\no_avatar.png' ));


    }
}
