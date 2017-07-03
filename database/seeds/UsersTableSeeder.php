<?php

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
        //Model::unguard();
        $this->createAdmin();
        //$user = factory('App\User', 5)->create();
        //Model::reguard();
    }

    private function createAdmin()
    {
        App\User::create([
            'name' => 'CARMEN ROJAS',
            'user' => 'CARMEN',
            'email' => 'carmenluisarojas890@hotmail.com',
            'password' => bcrypt('123456'),
            'role_id' => '1',
            'remember_token' => str_random(10),
        ]);
    }
    
}
