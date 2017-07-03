<?php

use Illuminate\Database\Seeder;

class TypeidentificationcardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('typeidentificationcards')->insert($data = array(
            [
                'typeidentificationcard'=> 'RIF-',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'typeidentificationcard'=> 'E-',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'typeidentificationcard'=> 'V-',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
