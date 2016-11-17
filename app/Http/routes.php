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

Route::group(['middleware' => ['web','auth:admin']], function () {
    // order
    Route::get('/admin/orders',                           ['as' => 'orders', 'uses' => 'OrderController@getIndex']);
   
    Route::get('/admin/orders/{id}',                      'OrderController@getShow');
    Route::get('/admin/orders/{id}/sendpush',             'OrderController@getSendpush');

    // car
    Route::get('/admin/cars',                             ['as'=>'cars', 'uses' => 'CarController@getIndex']);
    Route::post('/admin/cars',                            ['as'=>'cars', 'uses' => 'CarController@getIndex']);

    Route::get('/admin/get-business-hour',               'BusinessController@getBusinessHr');
    Route::get('/admin/edit-business-hour',              'BusinessController@editBusinessHr');
    Route::post('/admin/edit-business-hour',             'BusinessController@postEditBusinessHr');
    
    Route::get('/admin/cars/{id}',                       'CarController@getEdit');
    Route::put('/admin/cars/{id}',                       'CarController@postEdit');
    Route::get('/admin/cars/{id}/delete',                'CarController@getDelete');
    Route::get('/admin/cars/create',                     'CarController@getCreate');
    Route::post('/admin/cars/create',                    'CarController@postCreate');

    Route::get('/admin/drivers',                         ['as'=>'drivers', 'uses' => 'DriverController@getIndex']);
    Route::post('/admin/drivers/create',                 ['as'=>'drivers-create', 'uses' => 'DriverController@postCreate']);
    Route::get('/admin/drivers/{id}',                    ['as'=>'drivers-view', 'uses' => 'DriverController@getEdit']);
    Route::put('/admin/drivers/{id}',                    ['as'=>'drivers-edit', 'uses' => 'DriverController@putEdit']);
    Route::delete('/admin/drivers/{id}/delete',             ['as'=>'drivers-delete', 'uses' => 'DriverController@deleteDestroy']);

});

Route::group(['middleware' => ['web','guest']], function () {
    
    // howto
    Route::get('/howto',[ 'as' => 'howto', function () {
        return Response::view('howto'); 
    }]);

    // privacy policy
    Route::get('/privacy-policy',[ 'as' => 'privacy-policy', function () {
        return Response::view('privacy-policy'); 
    }]);
    
    // payment
    Route::get('/payments/{token}',                      'PaymentController@getShow');
    Route::post('/payments/{token}',                     'PaymentController@postCharge');
    Route::get('/payments/{token}/result',               'PaymentController@getResult');
    
    Route::get('/admin',                                 ['as'=>'login', 'uses' => 'Auth\AuthController@getLogin']);

    // Authentication routes...
    Route::get('/admin/auth/login',                      ['as'=>'login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('/admin/auth/login',                     'Auth\AuthController@postLogin');
    Route::get('/admin/auth/logout',                     ['as'=>'logout', 'uses' => 'Auth\AuthController@logout']);
    
    //Error pages
    Route::get('/401',                                   'HomeController@Unauthorized');
    Route::get('test-push',                              'HomeController@Testpush');
    Route::post('test-push',                             'HomeController@postTestpush');
    
});




