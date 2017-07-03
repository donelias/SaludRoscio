<?php

use Illuminate\Database\Seeder;

class TypeordersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('typeorders')->insert($data = array(
            [
                'typeorder'=> 'ENTRADA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'typeorder'=> 'SALIDA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
