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
    return view('demo');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Routes for socialite
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback','Auth\LoginController@handleProviderCallback');

//languages
Route::get('set_Language/{lang}','Controller@setLanguage')->name('set_Language');

//IMAGES
Route::get('/images/{path}/{attachment}', function($path, $attachment) {
    $file = sprintf('storage/$s/$s', $path, $attachment);
   if(File::exists($file)){
   	return \Intervention\Image\Facades\Image::make('$file')->response();
   }
});

