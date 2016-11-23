<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Auth::loginUsingId(1);
Route::get('/', 'HomeController@index');
Route::get('/view/{id}', 'Videos\SingleVideoPageController@viewCount');
Route::get('/single/{id}', 'Videos\SingleVideoPageController@show');
Route::get('/permission', function () {return view('errors.permissionNeeded');});
Route::get('/user/activation/{token}','ActivationController@userActivate');
Route::get('/view','ViewCounterController@storeView');

Auth::routes();

//-- media manage --//
Route::group(['middleware'=> ['admin','auth'],'prefix' => 'admin'], function() {
    Route::get('/deshboard', function () {return view('admin.deshboard');});
    Route::get('/all-media', 'Videos\MediaInfoController@index');
    Route::get('/add-media', 'Videos\MediaInfoController@create');
    Route::get('/media/{id}', 'Videos\MediaInfoController@showMedia');
    Route::post('/create-media', 'Videos\MediaInfoController@store');

// store only videos
    Route::get('/video/{id}/add-video','Videos\VideosUploadController@addVideo');
    Route::post('/video/{id}/store-demo-video', 'Videos\VideosUploadController@storeDemoVideo');
    Route::post('/video/{id}/store-premium-video', 'Videos\VideosUploadController@storePremiumVideo');
//-- media manage --//

//-- category --//
    Route::get('/categories','CategoriesController@create');
    Route::post('/create-category','CategoriesController@store');
    Route::get('/category/{id}/edit','CategoriesController@edit');
    Route::post('/category/{id}/update','CategoriesController@update');
    Route::get('/category/{id}/delete','CategoriesController@catDelete');

});


Route::group(['middleware'=> 'auth','prefix' => 'user'], function() {
    Route::get('/deshboard', function () {return view('admin.deshboard');});
    Route::get('/subscribe', 'SubscribeController@subscribeForm');
    Route::post('/create_subscribe', 'SubscribeController@subscribeCreate');
});
Route::group(['middleware' => 'auth'], function() {
    Route::post('/media_like/{id}', 'Videos\LikeDislikeController@storeLike');
    Route::post('/media_dislike/{id}', 'Videos\LikeDislikeController@storeDislike');
});
//-- category --//
