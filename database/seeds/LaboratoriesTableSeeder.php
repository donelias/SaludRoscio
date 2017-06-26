<?php

use Illuminate\Database\Seeder;

class LaboratoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('laboratories')->insert($data = array(
             [
                'laboratory'=> 'FARMACUBA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
             [
                'laboratory'=> 'HABANACUBA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
             [
                'laboratory'=> 'CONSALUD',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
             [
                'laboratory'=> 'MICROSULES-ARGENTINA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
             [
                'laboratory'=> 'NIFA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'laboratory'=> 'MEDILIP',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    
    }
}
