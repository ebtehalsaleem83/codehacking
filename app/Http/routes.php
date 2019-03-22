<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
});

Route::get('/home', 'HomeController@index' , function (){
    
    return Redirect::to('/admin');
});

Route::get('/admin',function (){
    return view('admin.index');
});



Route::group(['middleware'=>'admin'] , function (){
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');

});

