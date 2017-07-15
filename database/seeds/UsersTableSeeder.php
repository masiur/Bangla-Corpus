<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Use this user for login as admin
        User::create(['username' => 'admin','name' => 'Admin', 'email' => 'admin@mail.com','password' => bcrypt('a')]);
        //Use this user for login as user

        User::create(['username' => 'king',,'name' => 'Abdullah','email' => 'abdullahalawal177@gmail.com','password' => bcrypt('a')]);

        User::create(['username' => 'anonymous',,'name' => 'Anonymous', 'email' => 'anonymous@mail.com','password' => bcrypt('1234')]);
        //creating 10 test users
        // factory(User::class,10)->create();



    }
}
