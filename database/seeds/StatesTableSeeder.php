<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('states')->insert($data = array(
            [
                'state' => 'GUARICO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
