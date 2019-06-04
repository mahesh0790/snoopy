<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Board;
use App\Medium;
use App\SchoolType;
use App\Facility;
use App\SchoolPhoto;
use App\City;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        $boards = Board::all()->pluck("name","id");
        $mediums = Medium::all()->pluck("name","id");
        $school_types = SchoolType::all()->pluck("name","id");
        $facilities = Facility::all()->pluck("name","id");
        $cities = City::all()->pluck("name","id");

        
        return view('clientpage',compact('schools','boards','mediums','school_types','facilities','cities')); 
        
                  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $school = School::find($id);
        $boards = Board::all()->pluck("name","id");
        $mediums = Medium::all()->pluck("name","id");
        $school_types = SchoolType::all()->pluck("name","id");
        $facilities = Facility::all()->pluck("name","id");
        $cities = City::all()->pluck("name","id");
        $school_photos = SchoolPhoto::all()->where('school_id',$id);
       
        return view('clientschool',compact('school','boards','mediums','school_types','facilities','cities','school_photos')); 
    }

   
}
