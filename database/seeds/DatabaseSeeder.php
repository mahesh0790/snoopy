<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             
        BoardsTableSeeder::class,
        MediaTableSeeder::class,
        FacilitiesTableSeeder::class,
        SchoolTypesTableSeeder::class,
        CitiesTableSeeder::class,
    ]);
    }
}
