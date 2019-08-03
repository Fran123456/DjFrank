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


Route::get('suscription/plans', 'SubscriptionController@plans')->name('plans');
Route::get('suscription/admin', 'SubscriptionController@admin')->name('subscriptions.admin');
Route::post('suscription/process_subscription', 'SubscriptionController@processSubscription')->name('subscriptions.process_subscription');
Route::post('suscription/resume', 'SubscriptionController@resume')->name('subscriptions.resume');
Route::post('suscription/cancel', 'SubscriptionController@cancel')->name('subscriptions.cancel');


Route::group(['prefix' => "invoices"], function() {
  Route::get('/admin', 'InvoiceController@admin')->name('invoices.admin');
  Route::get('/{invoice}/download', 'InvoiceController@download')->name('invoices.download');
});

//COURSES
/*Route::group(['prefix' => 'Courses'], function(){
 Route::get('/{course}', 'CourseController@show')->name('courses.detail')
});*/
Route::get('/course/subscribed', 'CourseController@subscribed')->name('courses.subscribed');
Route::post('/course/add_review', 'CourseController@addReview')->name('courses.add_review');
Route::get('course/{course}', 'CourseController@show')->name('courses.detail');
Route::get('course/{course}/{episode}', 'CourseController@episode')->name('episode');
Route::get('/{course}/inscribe', 'CourseController@inscribe')->name('courses.inscribe');
Route::get('/course/{course}', 'CourseController@show')->name('courses.detail');
Route::get('/reaction', 'CourseController@reacction')->name('course.emoji');


Route::group(["prefix" => "profile", "middleware" => ["auth"]], function() {
	Route::get('/', 'ProfileController@index')->name('profile.index');
	//Route::put('/', 'ProfileController@update')->name('profile.update');
    Route::put('/', 'ProfileController@updatePassword')->name('profile.changePassword');
	Route::get('/password', 'ProfileController@password')->name('profile.password');
});



Route::group(['prefix' => "administration", "middleware" => ["auth"]], function() {
	Route::get('/courses', 'AdministratorController@courses')->name('teacher.courses');

	//Route::get('/students', 'TeacherController@students')->name('teacher.students');
	//Route::post('/send_message_to_student', 'TeacherController@sendMessageToStudent')->name('teacher.send_message_to_student');
});
