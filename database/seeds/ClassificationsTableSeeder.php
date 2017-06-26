<?php

use Illuminate\Database\Seeder;

class ClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('classifications')->insert($data = array(
            [
                'classification'=> 'ANTIBIOTICO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
              [
                'classification'=> 'ANTIPARASITORIOS',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'classification'=> 'ANTIGRIPALES',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

               [
                'classification'=> 'BRONCODILATADOR',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                 'classification'=> 'ANALGESICOS',
                 'created_at'=> new DateTime,
                 'updated_at'=> new DateTime
             ],

              [
                'classification'=> 'ANTIALERGICOS',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'classification'=> 'ANTIVIRALES',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
