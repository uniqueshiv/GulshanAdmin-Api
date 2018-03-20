<?php
use Prophecy\Doubler\Generator\ClassCreator;
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


Route::get('/','AdminController@index');

Auth::routes();
Route::get('/home', 'AdminController@index')->name('home');
Route::post('/login','Auth\AdminLoginController@login')->name('login');


//old

Route::post('apply/upload', 'ApplyController@upload');

Route::post('apply/logoload', 'ApplyController@logoload');
Route::resource('notifications', 'NotificationController');

Route::get('/dashboard', 'UserController@form');
Route::get('/events',function(){
        $events = App\Notification::orderBy('id', 'desc')
         ->where('catagory', 'events')
        ->get();
         return response()->json(['events'=>$events],200);
});
Route::get('/news',function(){
        $news = App\Notification::orderBy('id', 'desc')
         ->where('catagory', 'news')
        ->get();
         return response()->json(['news'=>$news],200);
});

Route::post('/contact','NotificationController@contactapi');

//Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/sendMessage', 'NotificationController@sendMessage');
Route::get('destroynotification/{id}', 'NotificationController@destroynotification');
Route::get('/xml',function () {
   $notifications =App\Notification::All();
   return json_encode($notifications);
  // $content = view('notifications.xmlservices', compact('notifications'));
  // return response($content)->header('Content-Type', 'text/xml');
});
//Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/sendMessage', 'NotificationController@sendMessage');
Route::get('destroynotification/{id}', 'NotificationController@destroynotification');
