<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert(array(
            array('name' =>'CBSE'),
            array('name' =>'State'),
            array('name' =>'ICSE'),
            array('name' =>'IGCSE'),
            array('name' =>'IB')
        ));

    }
}
