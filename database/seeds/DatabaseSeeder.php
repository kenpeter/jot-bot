<?php

use Illuminate\Database\Seeder;

// Illuminate
// Database
// Eloquent
// Model
use Illuminate\Database\Eloquent\Model;

// app and user
// app/User.php
use App\User;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Basically, it means this model can do mass assign values
    // static method
    Model::unguard();

    // clear up the users table
    DB::table('users')->delete();  

    // user array
    $users = array(
      // Name
      // Email
      // Password, it use Hask::make
      // password changes to test
      ['name' => 'Ryan Chenkie', 'email' => 'ryanchenkie@gmail.com', 'password' => Hash::make('test')],
      ['name' => 'Chris Sevilleja', 'email' => 'chris@scotch.io', 'password' => Hash::make('test')],
      ['name' => 'Holly Lloyd', 'email' => 'holly@scotch.io', 'password' => Hash::make('test')],
      ['name' => 'Adnan Kukic', 'email' => 'adnan@scotch.io', 'password' => Hash::make('test')],
    );
        
    // Loop through each user
    foreach ($users as $user)
    {
      // create user
      // static method
      User::create($user);
    }

    // model regard
    Model::reguard();
    
  }

  
}
