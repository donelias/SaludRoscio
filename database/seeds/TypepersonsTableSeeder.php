<?php

use Illuminate\Database\Seeder;

class TypepersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               DB::table('typepersons')->insert($data = array(
            [
                'typeperson'=> 'NATURAL',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
         
            [
                'typeperson'=> 'JURIDICA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
