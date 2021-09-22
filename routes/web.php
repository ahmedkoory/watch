<?php

use Illuminate\Support\Facades\Route;
// use  App\Http\Controllers\Front;
// use  App\Http\Controllers;
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

Route::get('/', function () {
    Auth::logout(); 
    return redirect('login');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
//verified ==> read from kerel.php (middleware)
//route parameters
Route::get('/test/{id}', function () {
    return 'welcome';
});

Route::get('/test1/{id?}', function () {
    return 'welcome';
}); //in the two wayes are work 
////route parameters

//route name :- i want any route by name to used in any plase 
Route::get('/test1/{id?}', function () {
    return 'welcome';
})->name('a');

//////////
//route namespase :- all route only access controller or method in folder name Front
// Route::namespace('/Front')->group(function () {
//    Route::get('ar','UserController@showAdminName');
// });
//////////

// Route::get('/ar', [Auth/UserController::class, 'test']);
Route::get('foo', 'App\Http\Controllers\Front\UserController@test');
   

//if you not login go login firstly
Route::get('chuck', function () {
    return 'welcome';
})->middleware('auth'); 

// Route::group(['namespace'=>'Front'],function () {
//     Route::get('g','UserController@test');
// });

//middleware by group
Route::group(['middleware'=>'auth'],function () {
    Route::get('users','App\Http\Controllers\UserController@test');
});
///////////
use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class);
///////////////////
Route::get('/landing', function () {
    return view('landing');
   
});

Route::get('/index', function () {
    return view('layouts.index');
   
});