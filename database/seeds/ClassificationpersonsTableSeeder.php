<?php

use Illuminate\Database\Seeder;

class ClassificationpersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classificationpersons')->insert($data = array(
            [
                'classificationperson'=> 'INSTITUCION PUBLICA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'classificationperson'=> 'INSTITUCION PRIVADA',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'classificationperson'=> 'PACIENTE',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'classificationperson'=> 'EMPLEADO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'classificationperson'=> 'AMBULATORIO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
