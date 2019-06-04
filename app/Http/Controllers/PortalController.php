<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portal_admins = Admin::all()->where('role','portal');
        if(count($portal_admins)>0){
        return view('portal',compact('portal_admins'));
        }else{
        return view('portalview');
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
        $portal_admin = Admin::find($id);
        return view('portaldetails',compact('portal_admin'));
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
            'mobile_number' =>'required|string|numeric|digits:10',
            
        ]);
   
        $user = Admin::find($id); 
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->mobile_number = $input['mobile_number'];
        
         
        $user->save();
        return redirect('/portal');    

        
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
        return redirect('/portal');
    }
}
