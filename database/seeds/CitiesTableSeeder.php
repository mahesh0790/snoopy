<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cities')->insert(array(
            array('name' =>'Alappuzha'),
            array('name' =>'Amaravathi'),
            array('name' =>'Ballari'),
            array('name' =>'Bengaluru'),
            array('name' =>'Belgaum'),
            array('name' =>'Bidar'),
            array('name' =>'Chennai'),
            array('name' =>'Coimbatore'),
            array('name' =>'Erode'),
            array('name' =>'Gulbarga'),
            array('name' =>'Guntur'),
            array('name' =>'Hubli'),
            array('name' =>'Hyderabad'),
            array('name' =>'Kochi'),
            array('name' =>'Kodaikanal'),
            array('name' =>'Kakinada'),
            array('name' =>'Kollam'),
            array('name' =>'Kumbakonam'),
            array('name' =>'Kanchipuram'),
            array('name' =>'Kannur'),
            array('name' =>'Kanyakumari'),
            array('name' =>'Kasaramgod'),
            array('name' =>'Kottayam'),
            array('name' =>'Kozhikode'),
            array('name' =>'Madikeri'),
            array('name' =>'Madurai'),
            array('name' =>'Mahabalipuram'),
            array('name' =>'Mangaluru'),
            array('name' =>'Mysuru'),
            array('name' =>'Nellore'),
            array('name' =>'Ooty'),
            array('name' =>'Palakkad'),
            array('name' =>'Portblair'),
            array('name' =>'Puducherry'),
            array('name' =>'Rajamundry'),
            array('name' =>'Salem'),
            array('name' =>'Secundrabad'),
            array('name' =>'Thanjavur'),
            array('name' =>'Tiruchirappalli'),
            array('name' =>'Thiruvananthapuram'),
            array('name' =>'Thrissur'),
            array('name' =>'Thoothukodi'),
            array('name' =>'Tirunelveli'),
            array('name' =>'Tirupathi'),
            array('name' =>'Tirupur'),
            array('name' =>'Vellore'),
            array('name' =>'Vijayapura'),
            array('name' =>'Vizayawada'),
            array('name' =>'Visakapatnam'),
            array('name' =>'Vizianagaram'),
            array('name' =>'Warangal')
            
            
            
         ));   
    }
}
