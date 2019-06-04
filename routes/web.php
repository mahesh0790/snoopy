<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('layout',function(){
        return view('layout');
    });
});  
    Route::group(['middleware'=>['auth','super']],function(){
    Route::resource('portal','PortalController');
    Route::get('portalview',function(){
       return view('portalview');
    });
});
Route::group(['middleware'=>['auth','portal']],function(){
    Route::resource('school','SchoolController');
    Route::get('schoolview',function(){
        return view('schoolview');
    });
});
    
Route::group(['middleware'=>['auth','school']],function(){ 
    Route::resource('addschool','AddSchoolController'); 
    Route::resource('newschool','NewSchoolController');  
    Route::post('media', 'AddSchoolController@storeMedia')
  ->name('schools.storeMedia');
});
Route::group(['middleware'=>['auth']],function(){ 
Route::resource('/','ProfileController');
Route::get('changepassword','ChangePasswordController@index');
Route::post('/changePassword','ChangePasswordController@changePassword')->name('changePassword');
Route::get('/logout',"Auth\LoginController@logout");
});
Route::resource('/school_details','ClientController');
    
