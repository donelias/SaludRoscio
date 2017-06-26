<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('status')->insert($data = array(
            [
                'statu' => 'ACTIVO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
       
            [
                'statu' => 'INACTIVO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
