<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert($data = array(
            [
                'role' 		=> 'ADMINISTRADOR',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
       
            [
                'role' 		=> 'USUARIO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    } 
}
