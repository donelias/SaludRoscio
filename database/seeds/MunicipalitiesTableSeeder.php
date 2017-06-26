<?php

use Illuminate\Database\Seeder;

class MunicipalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('municipalities')->insert($data = array(
            [
                'municipality' => 'ROSCIO',
                'state_id' => '1',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        ); 
    }
}
