<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        if(Auth::user()->role == 'super'){
          $school_admins = DB::table('admins')->where('role','school')->get();
          if(count($school_admins)>0){
                return view('school',compact('school_admins'));
            }else{
                return view('schoolview');
            }
        }else{
          $school_admins = DB::table('admins')->where(['admin'=> Auth::user()->id,'role'=>'school'])->get();  
          if(count($school_admins)>0){
                return view('school',compact('school_admins'));
            }else{
            return view('schoolview');
            }
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $school_admin = Admin::find($id);
        return view('schooldetails',compact('school_admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile_number' =>'required|string|numeric|regex:/^[6789]\d{9}$/|digits:10',
            
        ]);
   
        $user = Admin::find($id); 
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->mobile_number = $input['mobile_number'];
        
        $user->save();
        return redirect('/school');    

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $user = Admin::find($id);
        $user->delete();
        return redirect('/school');
    }
}
