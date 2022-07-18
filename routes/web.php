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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/', 'ExhibitionController@index');
Route::get('/import', 'ImportController@index');
Route::post('/uploadFile', 'ImportController@uploadFile');
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/exhibitions/{id}/{exhibition}', 'ExhibitionController@show')->name('exhibitions.show');//dikasih nama exhibition.show sehingga mudah memanggilnya.
Route::get('/exhibitions/allexhibitions', 'ExhibitionController@allexhibitions')->name('allexhibitions');
Route::get('/exhibitions/search', 'ExhibitionController@searchExhibition');
Route::get('/exhibitor/{id}/{exhibitor}', 'ExhibitorController@index')->name('exhibitor.index');
Route::get('/blog/index', 'BlogController@index')->name('blog');



Route::group(['middleware' => ('visitor' || 'exhibitor' || 'guest' || '')], function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/exhibitions/allexhibitions', 'ExhibitionController@allexhibitions')->name('allexhibitions');
    Route::get('/exhibitions/search', 'ExhibitionController@searchExhibition');
    Route::get('/exhibitor/{id}/{exhibitor}', 'ExhibitorController@index')->name('exhibitor.index');

    // Exhibitions Profile
    Route::get('/exhibitions/{id}/{exhibition}', 'ExhibitionController@show')->name('exhibitions.show');//dikasih nama exhibition.show sehingga mudah memanggilnya.
    
    Route::get('/exhibitions/create', 'ExhibitionController@create')->name('exhibitions.create');
    Route::post('/exhibitions/store', 'ExhibitionController@store')->name('exhibitions.store');
    Route::get('/exhibitions/myexhibitions', 'ExhibitionController@myexhibitions')->name('exhibitions.myexhibitions');
    Route::post('/exhibitions/apply/{id}', 'ExhibitionController@apply')->name('exhibitions.apply');
    Route::get('/exhibitions/applicants', 'ExhibitionController@applicants');
    Route::post('/applications/{id}', 'ExhibitionController@apply')->name('apply');
    Route::post('/exhibitions/image', 'ExhibitionController@image')->name('exhibitions.image');
    Route::get('/exhibitions/{id}/{slug}/edit', 'ExhibitionController@edit')->name('exhibitions.edit');
    Route::post('/exhibitions/{id}/{slug}/update', 'ExhibitionController@update')->name('exhibitions.update');
    Route::post('/exhibitions/{id}/{slug}/imgdesc', 'ExhibitionController@imgdesc')->name('exhibitions.imgdesc');

    Route::post('/exhibitions/{id}/{slug}/imagepost', 'ExhibitionController@imagepost')->name('exhibitions.imagepost');
    Route::post('/exhibitions/{id}/{slug}/archivepost', 'ExhibitionController@archivepost')->name('exhibitions.archivepost');

    Route::post('/exhibitions/{id}/{slug}/arcdesc', 'ExhibitionController@arcdesc')->name('exhibitions.arcdesc');
    Route::post('/exhibitions/{id}/{slug}/faq', 'ExhibitionController@faq')->name('exhibitions.faq');
    Route::delete('/exhibitions/{id}', 'ExhibitionController@destroy')->name('exhibitions.destroy');
    
    Route::post('/exhibitions/fav', 'ExhibitionController@fav')->name('exhibitions.fav');
    Route::post('/exhibitions/unfav', 'ExhibitionController@unfav')->name('exhibitions.unfav');
    
    Route::post('/exhibitions/entry', 'ExhibitionController@entry')->name('exhibitions.entry');
    Route::post('/exhibitions/unentry', 'ExhibitionController@unentry')->name('exhibitions.unentry');
    
    Route::post('/exhibitions/message', 'ExhibitionController@message')->name('exhibitions.message');
    Route::post('/exhibitions/delmessage', 'ExhibitionController@delmessage')->name('exhibitions.delmessage');
    
    Route::post('/exhibitor/imagestore', 'ExhibitorController@imagestore')->name('exhibitor.imagestore');
    Route::post('/exhibition/imagestore', 'ExhibitionController@imagestore')->name('exhibition.imagestore');
    // Search Exhibitions With Vue Js


    // Save and Unsave Exhibition
    Route::post('/save/{id}', 'FavoriteController@saveExhibition');
    Route::post('/unsave/{id}', 'FavoriteController@unSaveExhibition');


    // Exhibitor Profile
    Route::get('/exhibitor/create', 'ExhibitorController@create')->name('exhibitor.create'); // untuk exhibitor
    Route::post('/exhibitor/store', 'ExhibitorController@store')->name('exhibitor.store');
    Route::post('/exhibitor/coverphoto', 'ExhibitorController@coverphoto')->name('exhibitor.coverphoto');
    Route::post('/exhibitor/logo', 'ExhibitorController@logo')->name('exhibitor.logo');

    // User Profile
    Route::get('/user/profile', 'UserProfileController@index')->name('user.profile');
    Route::post('/profile/store', 'UserProfileController@store')->name('profile.store');
    Route::post('/profile/coverletter', 'UserProfileController@coverletter')->name('profile.coverletter');
    Route::post('/profile/resume', 'UserProfileController@resume')->name('profile.resume');
    Route::post('/profile/avatar', 'UserProfileController@avatar')->name('profile.avatar');

    // Route::post('/login', 'UserProfileLoginController@login')->middleware('seeker');

    // Exhibitor Profile
    Route::view('/exhibitor/profile', 'auth.exhibitor-register')->name('exhibitor.registration');
    Route::post('/exhibitor/profile/store', 'ExhibitorProfileController@store')->name('exhibitor.store');

});

// Route::group(['middleware' => 'exhibitor'], function(){

//     Route::get('/exhibitions/{id}/{exhibition}', 'ExhibitionController@show')->name('exhibitions.show');//dikasih nama exhibition.show sehingga mudah memanggilnya.
        
    
// });
