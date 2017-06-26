<?php

use Illuminate\Database\Seeder;

class ParishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
         public function run()
    {
         DB::table('parishes')->insert($data = array(
            [
                'parish' => 'SAN JUAN',
                'municipality_id' => '1',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
                 ],
            [
                'parish' => 'CANTA GALLO',
                'municipality_id' => '1',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
                 ],
              [

                'parish' => 'PARAPARA',
                'municipality_id' => '1',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime

            ])

        );
    }
}
