<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function ()
{
    return view('index');
    //home page route
});

Route::get('/about', function ()
{
    return view('about');
    //about page route
});

Route::get('/modules', function()
{
    return view('/modules');
    //Modules route
});
