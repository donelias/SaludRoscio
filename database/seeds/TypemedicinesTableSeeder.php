<?php

use Illuminate\Database\Seeder;

class TypemedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('typemedicines')->insert($data = array(
            [
                'typemedicine'=> 'CAPSULAS',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'typemedicine'=> 'TABLETAS',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'typemedicine'=> 'GRAGEAS',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

               [
                'typemedicine'=> 'AEROSOL',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

             [
                'typemedicine'=> 'AMPOLLAS',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

            [
                'typemedicine'=> 'JARABES',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
