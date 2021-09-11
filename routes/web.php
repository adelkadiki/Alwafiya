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




Auth::routes(['register' => false]);

Route::get('/', 'WebpageController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addpack', 'WebpageController@addpack')->name('webpages.addpack');
Route::get('/dist', 'WebpageController@dist')->name('webpages.dist');
Route::post('/submitpack', 'WebpageController@submitpack')->name('webpages.submit');
Route::get('/editship/{shipment}', 'WebpageController@editship');
Route::get('/track', 'WebpageController@track');
Route::get('/manyreq', 'WebpageController@manyreq');
Route::post('/contact', 'WebpageController@contact');
Route::middleware('throttle:3,1')->group(function () {
  Route::get('/trackpack', 'WebpageController@trackpack');
});

// Edit
Route::get('/mobtrack/{id}', 'WebpageController@mobtrack');

//Route::middleware('cors')->group(function(){
    Route::get('/getlaunchships','WebpageController@getlaunchships');
    Route::post('/mobpacksub', 'WebpageController@mobpacksub');
//});



// Editf

Route::group(['middleware'=>['auth']], function(){
Route::get('/mainpage', 'WebpageController@mainpage');
Route::get('/addship', 'WebpageController@addship');
Route::post('/submitship', 'WebpageController@submitship');
Route::get('/newship', 'WebpageController@newship');
Route::get('/packlist/{shipment}', 'WebpageController@packlist');
Route::get('/packdetails/{package}', 'WebpageController@packdetails')->name('pack.details');
Route::get('/updatepack/{package}', 'WebpageController@updatepack');
Route::put('/shipedit', 'WebpageController@shipedit');
Route::put('/packupdate', 'WebpageController@packupdate');
Route::get('/editinfo/{shipment}', 'WebpageController@editinfo');
Route::get('/arrival/{shipment}', 'WebpageController@arrival');
Route::get('/shipmentstatus/{shipment}', 'WebpageController@shipmentstatus');
Route::put('/updshipstatus', 'WebpageController@updshipstatus');
Route::get('/departure', 'WebpageController@departure');
Route::get('/back', 'WebpageController@back');
Route::get('/arrivedship', 'WebpageController@arrivedship');
Route::get('/sendemail/{package}', 'WebpageController@sendemail');
Route::put('/submitemail', 'WebpageController@submitemail');
Route::get('/arrivedpacklist/{shipment}', 'WebpageController@arrivedpacklist')->name('arrived.pack');
Route::get('/departpacklist/{shipment}', 'WebpageController@departpacklist');
Route::delete('/deletepack/{package}', 'WebpageController@deletepack');
Route::get('/findpack', 'WebpageController@findpack');
Route::get('/searchpack', 'WebpageController@searchpack')->name('search.pack');
Route::get('/searchres/{pack}', 'WebpageController@searchres');
Route::get('/delivery/{package}', 'WebpageController@delivery');
Route::put('/deliverysubmit', 'WebpageController@deliverysubmit');
Route::get('/archived', 'WebpageController@archived');
Route::get('/findship', 'WebpageController@findship');
Route::delete('/deleteship/{shipment}', 'WebpageController@deleteship');
Route::get('/searchship', 'WebpageController@searchship')->name('search.ship');
Route::get('/searhshippack/{shipment}', 'WebpageController@searhshippack');
});
