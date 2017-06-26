<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypepersonsTableSeeder::class);
        $this->call(DrugsTableSeeder::class);
        $this->call(StatesTableSeeder::class);   
        $this->call(MunicipalitiesTableSeeder::class); 
        $this->call(ParishesTableSeeder::class);  
        $this->call(SectorsTableSeeder::class);  
        $this->call(TypemedicinesTableSeeder::class);
        $this->call(ClassificationsTableSeeder::class);
        $this->call(ClassificationpersonsTableSeeder::class);
        $this->call(MeasurementTableSeeder::class);
        $this->call(TypeidentificationcardsTableSeeder::class);
        $this->call(TypeordersTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
        $this->call(StatusTableSeeder::class);

}
} 
 