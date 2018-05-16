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
    //

    // Route::get('/',['uses'=>'SignaliController@index', 'as'=>'home']);

    // Route::get('/restrict',['uses'=>'SignaliController@restrict', 'as'=>'restrict']);

    Route::controller('datatables', 'DatatablesController', [
        'anyData'  => 'datatables.data',
        'getIndex' => 'datatables',
    ]);
    
    Route::get('/podelenie_autocomplete', ['uses' => 'AotocompleteController@podelenie_autocomplete', 'as' => 'podelenie_autocomplete' ]);


    Route::group(['middleware' => ['active_session']], function() {
            
        Route::get('/',['uses'=>'SignaliController@index', 'as'=>'home']);

        Route::get('/logout', ['uses'=>'LogoutController@logout', 'as'=>'logout']);
        
        Route::get('signali', ['uses'=>'SignaliController@show', 'as'=>'signali']);

        Route::get('create', ['uses'=>'SignaliController@create', 'as'=>'create']);

        Route::post('create', 'SignaliController@store');

        Route::get('/signal/{id}', ['uses'=>'SignaliController@show_one', 'as'=>'signal']);

    });



    




