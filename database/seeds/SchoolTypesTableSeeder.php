<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_types')->insert(array(
            array('name' =>'Co-Education'),
            array('name' =>'BOYS'),
            array('name' =>'GIRLS')
            
        ));

    }
}


