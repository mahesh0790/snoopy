<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('media')->insert(array(
            array('name' =>'English'),
            array('name' =>'Telugu'),
            array('name' =>'Hindi'),
            array('name' =>'Kannada'),
            array('name' =>'Tamil')
        ));

    }
}

