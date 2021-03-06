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
Route::get('/comments/{postId}','CommentController@showComment');
Route::get('/media/category/{catId}','HomeController@categoryPage');
Route::get('/search_results','HomeController@search');

//Route::post('/view','ViewCounterController@storeView');

Auth::routes();

//-- media manage --//
Route::group(['middleware'=> ['admin','auth'],'prefix' => 'admin'], function() {
    Route::get('/deshboard', 'PanelController@admin');
//-- manage media info --//
    Route::get('/all-media', 'Videos\MediaInfoController@index');
    Route::get('/add-media', 'Videos\MediaInfoController@create');
    Route::post('/create-media', 'Videos\MediaInfoController@store');
    Route::get('/media/{id}', 'Videos\MediaInfoController@showMedia');
    Route::get('/media/{id}/edit', 'Videos\MediaInfoController@edit');
    Route::post('/media/{id}/update', 'Videos\MediaInfoController@update');
    Route::post('/media/{id}/delete', 'Videos\MediaInfoController@delete');

// store only videos
    Route::get('/video/{id}/add-video','Videos\VideosUploadController@addVideo');
    Route::post('/video/{id}/store-demo-video', 'Videos\VideosUploadController@storeDemoVideo');
    Route::post('/video/{id}/store-premium-video', 'Videos\VideosUploadController@storePremiumVideo');
    Route::post('/video/{mediaId}/update-demo-video/{videoId}','Videos\VideosUploadController@updateDemo');
    Route::post('/video/{mediaId}/update-premium-video/{videoId}','Videos\VideosUploadController@updatePremium');
//-- media manage --//

//-- category --//
    Route::get('/categories','CategoriesController@create');
    Route::post('/create-category','CategoriesController@store');
    Route::get('/category/{id}/edit','CategoriesController@edit');
    Route::post('/category/{id}/update','CategoriesController@update');
    Route::get('/category/{id}/delete','CategoriesController@catDelete');

//-- user manage --//
    Route::get('/users','UserDetailController@users');
//-- demand mange  --//
    Route::get('/demands','OnDemandController@index');
    Route::post('/demand/{id}/publish','OnDemandController@publish');

});


Route::group(['middleware'=> 'auth','prefix' => 'user'], function() {
    Route::get('/deshboard', 'UserDetailController@userBoard');
    Route::get('/subscribe', 'SubscribeController@subscribeForm');
    Route::post('/create_subscribe', 'SubscribeController@subscribeCreate');
    Route::post('/resume_subscribe', 'SubscribeController@subscribeResume');
    Route::post('/upgrade_subscribe', 'SubscribeController@subscribeUpgrade');
    Route::post('/cancel_subscribe', 'SubscribeController@subscribeCancel');

    Route::post('/store_demand','OnDemandController@store');
    Route::get('/demands','OnDemandController@userDemands');

//    comment
    Route::post('/store_comment/{postId}','CommentController@storeComment');
});
Route::group(['middleware' => 'auth'], function() {
    Route::post('/media_like/{id}', 'Videos\LikeDislikeController@storeLike');
    Route::post('/media_dislike/{id}', 'Videos\LikeDislikeController@storeDislike');
});
//-- category --//
