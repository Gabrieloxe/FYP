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


Route::group(['middleware' => ['web']], function(){
  Auth::routes();
  Route::get('/', 'AccountController@index')->name('dashboard');



  Route::get('/clients-full-list',
  ['as' => 'clients.fulllist',
   'uses' => '\App\Models\Clients\ClientController@index_client_full_list'
 ]);


  Route::get('/clients-new',  [
    'as' => 'clients.new',
  'uses' => '\App\Models\Clients\ClientController@index_client_new'
]);


  Route::get('/companies-full-list',  [
    'as' => 'companies.fulllist',
  'uses' => '\App\Models\Clients\ClientController@index_companies_full_list'
]);

Route::get('/companies-new',  [
  'as' => 'companies.new',
'uses' => '\App\Models\Clients\ClientController@index_companies_new'
]);

Route::get('/data-presentation',  [
  'as' => 'data.presentation',
'uses' => 'AccountController@index_data_presentation'
]);

Route::get('/settings',  [
  'as' => 'settings',
'uses' => 'AccountController@index_settings'
]);

  Route::get('/socialwall',  [
    'as' => 'social.wall',
  'uses' => '\App\Models\SocialWall\SocialWallController@index'
  ]);


  Route::post('/newpost',  [
    'as' => 'new.post',
  'uses' => '\App\Models\SocialWall\SocialWallController@addPost'
  ]);

  Route::post('/deletepost ',  [
    'as' => 'delete.post',
  'uses' => '\App\Models\SocialWall\SocialWallController@removePost'
  ]);


    Route::post('/editpost ',  [
      'as' => 'edit.post',
    'uses' => '\App\Models\SocialWall\SocialWallController@editPost'
    ]);

    Route::post('/likepost ',  [
      'as' => 'like.post',
    'uses' => '\App\Models\SocialWall\SocialWallController@postLikePost'
    ]);
  // Route::get('/register', [
  //   'as' => 'register',
  //   'uses' => 'AccountController@register',
  // ]);
  //
  // Route::get('/logout', [
  //   'as' => 'logout',
  //   'uses' => '\App\Models\Users\UserController@logout',
  // ]);
});
