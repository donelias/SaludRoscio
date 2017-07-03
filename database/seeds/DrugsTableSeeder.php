<?php

use Illuminate\Database\Seeder;

class DrugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('drugs')->insert($data = array(
            [
                'drug'=> 'ADULTO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'drug'=> 'PEDIATRICO',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ])

        );
    }
}
