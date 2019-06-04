<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert(array(
            array('name' =>'Library'),
            array('name' =>'Smart Classroom'),
            array('name' =>'Transport')
            
        ));

    }
}


