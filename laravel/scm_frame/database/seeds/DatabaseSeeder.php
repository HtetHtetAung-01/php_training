<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert(
      // [
      //   'name' => 'admin',
      //   'email' => 'scm.aungpyaesone@gmail.com',
      //   'password' => Hash::make('password'),
      //   'profile' => '1588646773.png',
      //   'type' => '0',
      //   'created_user_id' => 1,
      //   'updated_user_id' => 1,
      // ],
      [
        'name' => 'member',
        'email' => 'htethtet.ucsy16@gmail.com',
        'password' => Hash::make('1234'),
        'profile' => '',
        'type' => '0',
        'created_user_id' => 1,
        'updated_user_id' => 1,
    ]
    );
  }
}
