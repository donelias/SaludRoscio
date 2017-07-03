<?php

use Illuminate\Database\Seeder;

class MeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('measurements')->insert($data = array(
            [
                'measurement'=> 'G',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'measurement'=> 'MG',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'measurement'=> 'ML',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
