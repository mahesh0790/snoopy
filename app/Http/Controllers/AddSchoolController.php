<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Auth;
use App\School;
use App\Board;
use App\Medium;
use App\SchoolType;
use App\Facility;
use App\SchoolPhoto;
use App\City;

class AddSchoolController extends Controller
{
    public function index()
    {
        $schools = School::all()->where('created_by', Auth::user()->id);  
        $boards = Board::all()->pluck("name","id");
        $mediums = Medium::all()->pluck("name","id");
        $school_types = SchoolType::all()->pluck("name","id");
        $facilities = Facility::all()->pluck("name","id");
        $cities = City::all()->pluck("name","id");

        if(count($schools)>0){
            return view('addschool',compact('schools'));
        }else{
            return view('newschool',compact('boards','mediums','school_types','facilities','cities')); 
        }
    }

     public function store(Request $request,School $school)  
    {
        $input = $request->all();

         request()->validate([
                'school_name' => 'required|string',
                'area'=>'required|string',
                'pincode' => 'required',
                'city'=>'required|string',
                'boards'=>'required',
                'mobile_number' =>'required|string|numeric|digits:10|regex:/^[6789]\d{9}$/|unique:schools',
                'email'=>'nullable|email|unique:schools',
                'website'=>'nullable|url',
                'max_students_per_class'=>'nullable|string',
                'mediums'=>'required',
                'facilities'=>'required',
                'school_types'=>'required',
                'admission_start_date'=>'nullable|date',
                'admission_end_date'=> 'nullable|date|after:admission_start_date',
                'extra_activities'=>'nullable',
                'school_image'=>'required | mimes:jpeg,jpg,png'
            
        ]);
    
       $path = $request->file('school_image')->store('public');
        
        $pathName = basename($path);        
        
        $school = School::create([
        'school_name' => $input['school_name'],
        'area' => $input['area'],
        'pincode' => $input['pincode'],
        'city' => $input['city'],
        'boards' => $input['boards'],
        'mobile_number' => $input['mobile_number'],
        'email' => $input['email'],
        'website' => $input['website'],
        'max_students_per_class' => $input['max_students_per_class'],
        'mediums' => $input['mediums'],
        'facilities' => $input['facilities'],
        'school_types' => $input['school_types'],
        'admission_start_date' => $input['admission_start_date'],
        'admission_end_date' => $input['admission_end_date'],
        'extra_activities' => $input['extra_activities'],
        'school_image' => $pathName,
        'created_by'=>Auth::user()->id
        
        ]);

      foreach ($request->input('school_photos', []) as $file) {
            $SchoolPhoto = new SchoolPhoto;
            $SchoolPhoto->school_id = $school->id;
            $SchoolPhoto->filename = $file;
            $SchoolPhoto->save();
       }   
        return redirect('/addschool');
    }
    
    public function storeMedia(Request $request)
    {
    $path = storage_path('app/public/gallery');

    $file = $request->file('file');

    $name = uniqid() . '_' . trim($file->getClientOriginalName());

    $file->move($path, $name);

    return response()->json([
        'name'          => $name,
        'original_name' => $file->getClientOriginalName(),
    ]);
    }



    public function show($id){
        $school = School::find($id);
        $boards = Board::all()->pluck("name","id")->toArray();
        $mediums = Medium::all()->pluck("name","id")->toArray();
        $school_types = SchoolType::all()->pluck("name","id")->toArray();
        $facilities = Facility::all()->pluck("name","id")->toArray();
        $cities = City::all()->pluck("name","id");
        
        return view('schooledit',compact('school','boards','mediums','school_types','facilities','cities')); 
     }  

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        $input = $request->all(); 
        $image_name = $request->hidden_image;
        $image = $request->school_image;
        if($image){
            $path = $request->file('school_image')->store('public');
            $pathName = basename($path); 
            $school = School::find($id); 
            $school->school_name=$input['school_name'];
            $school->area=$input['area'];       
            $school->pincode=$input['pincode'];        
            $school->city=$input['city'];
            $school->boards=$input['boards'];
            $school->mobile_number=$input['mobile_number'];
            $school->email=$input['email']; 
            $school->website=$input['website']; 
            $school->max_students_per_class=$input['max_students_per_class']; 
            $school->mediums=$input['mediums']; 
            $school->facilities=$input['facilities']; 
            $school->school_types=$input['school_types']; 
            $school->admission_start_date=$input['admission_start_date'];
            $school->admission_end_date=$input['admission_end_date']; 
            $school->extra_activities=$input['extra_activities']; 
            $school->school_image=$pathName;
            $school->save();
        }  else{
            $school = School::find($id); 
            $school->school_name=$input['school_name'];
            $school->area=$input['area'];       
            $school->pincode=$input['pincode'];        
            $school->city=$input['city'];
            $school->boards=$input['boards'];
            $school->mobile_number=$input['mobile_number'];
            $school->email=$input['email']; 
            $school->website=$input['website']; 
            $school->max_students_per_class=$input['max_students_per_class']; 
            $school->mediums=$input['mediums']; 
            $school->facilities=$input['facilities']; 
            $school->school_types=$input['school_types']; 
            $school->admission_start_date=$input['admission_start_date'];
            $school->admission_end_date=$input['admission_end_date']; 
            $school->extra_activities=$input['extra_activities']; 
            $school->school_image=$image_name;
            $school->save();
        }

        return redirect('/addschool');   
        
    }
     
     
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school_photos = SchoolPhoto::all()->where('school_id',$id);
        foreach($school_photos as $school_photo){
        $school_photo->delete();
        }
        $school = School::find($id);
        $school->delete();
        return redirect('/addschool');
    }
    
     
    
}