<?php
class UsersTableSeeder extends Seeder {
  public function run()
  {
    DB::table('users')->delete();

    $users = array(
      array(
        'username'  => 'johan',
        'full_name'  => 'Johan Ramirez',
        'password'  => Hash::make('siptelco.08'),
        'rol'       => 1 ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'username'  => 'nicolas',
        'full_name'  => 'Nicolas Ramirez',
        'password'  => Hash::make('siptelco.08'),
        'rol'       => 2 ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
    );

    DB::table('users')->insert( $users );
  }
}
