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
//Rutas publicas
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


//Rutas solo accesibles por el administrador
Route::group(['middleware' => 'auth'], function(){

    Route::get('/invoice', function () {
        return view('invoice.invoice');
    });

    Route::get('/people/proveedores/{id}', 'Admin\\PeopleController@index');
    Route::get('/people/pacientes/{id}', 'Admin\\PeopleController@index');
    Route::get('/people/empleados/{id}', 'Admin\\PeopleController@index');
    Route::get('/people/ambulatorios/{id}', 'Admin\\PeopleController@index');

    Route::get('/admin/people/{id}', 'Admin\\PeopleController@show');
    Route::get('/admin/people', 'Admin\\PeopleController@people');
    Route::get('/people/create', 'Admin\\PeopleController@create');
    Route::post('/admin/people/', 'Admin\\PeopleController@store');


    Route::get('/home', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);

   // Route::resource('admin/people', 'Admin\\PeopleController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/state', 'Admin\\StateController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/role', 'Admin\\RoleController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/order', 'Admin\\OrderController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/product', 'Admin\\ProductController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/municipality', 'Admin\\MunicipalityController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/sector', 'Admin\\SectorController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/parish', 'Admin\\ParishController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/address', 'Admin\\AddressController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/typeperson', 'Admin\\TypepersonController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/classification', 'Admin\\ClassificationController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/drug', 'Admin\\DrugController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/typemedicine', 'Admin\\TypemedicineController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/statu', 'Admin\\StatuController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/laboratory', 'Admin\\LaboratoryController', ['only' => ['index', 'show', 'create', 'store']]);

    //Route::resource('admin/itemsorder', 'Admin\\ItemsorderController');---> Este controlador no existe

    Route::resource('admin/measurement', 'Admin\\MeasurementController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/typeidentificationcard', 'Admin\\TypeidentificationcardController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('admin/classificationperson', 'Admin\\ClassificationpersonController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::get('order/into', [
        'as' => 'order-into',
        'uses' => 'Admin\\OrderController@addInto'
    ]);

    Route::get('order/out', [
        'as' => 'order-out',
        'uses' => 'Admin\\OrderController@addOut'
    ]);

    Route::get('/order/findClient', 'Admin\\OrderController@findClient');
    Route::get('/order/findProduct', 'Admin\\OrderController@findProduct');
    Route::post('/order/save', 'Admin\\OrderController@orderSave');
    Route::get('order', 'Admin\\OrderController@index');
    Route::get('/order/detail/{id}', 'Admin\\OrderController@detail');

    Route::post('/order/saveOut', 'Admin\\OrderController@orderSaveOut');
    Route::post('/order/save', 'Admin\\OrderController@orderSave');
    Route::get('order', 'Admin\\OrderController@index');
    Route::get('/order/detail/{id}', 'Admin\\OrderController@detail');
    Route::get('/order/pdf/{id}', 'Admin\\OrderController@pdf');
    Route::post('/order/saveOut', 'Admin\\OrderController@orderSaveOut');


    Route::group(['middleware' => 'role'], function() {

        Route::resource('admin/role', 'Admin\\RoleController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/state', 'Admin\\StateController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/order', 'Admin\\OrderController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/product', 'Admin\\ProductController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/municipality', 'Admin\\MunicipalityController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/sector', 'Admin\\SectorController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/parish', 'Admin\\ParishController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/address', 'Admin\\AddressController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/typeperson', 'Admin\\TypepersonController', ['only' => ['edit', 'update', 'destroy']]);

        //Route::resource('admin/people', 'Admin\\PeopleController');
        Route::resource('admin/people', 'Admin\\PeopleController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/classification', 'Admin\\ClassificationController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/drug', 'Admin\\DrugController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/typemedicine', 'Admin\\TypemedicineController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/measurement', 'Admin\\MeasurementController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/typeidentificationcard', 'Admin\\TypeidentificationcardController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/classificationperson', 'Admin\\ClassificationpersonController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/statu', 'Admin\\StatuController', ['only' => ['edit', 'update', 'destroy']]);

        Route::resource('admin/laboratory', 'Admin\\LaboratoryController', ['only' => ['edit', 'update', 'destroy']]);

        Route::get('/admin/edit/{id}', [
            'as' => 'user-edit',
            'uses' => 'Admin\UserController@edit'
        ]);

        Route::post('/admin/user/edit/{id}', [
            'as' => 'user-edit',
            'uses' => 'Admin\UserController@update'
        ]);


        Route::delete('/admin/delete-usuario/{id}', [
            'as' => 'user-delete',
            'uses' => 'Admin\UserController@destroy'
        ]);

        Route::get('/admin/order/{product}',[
            'as' => 'cart-delete',
            'uses' => 'Admin\\OrderController@delete'
        ]);

        Route::get('/admin/usuario', [
            'as' => 'user',
            'uses' => 'Admin\UserController@index'
        ]);

        Route::post('/admin/crear-usuario', [
            'as' => 'user-create',
            'uses' => 'Admin\UserController@store'
        ]);

        Route::get('/admin/add-usuario', [
            'as' => 'user-add',
            'uses' => 'Admin\UserController@create'
        ]);

// CRUD

        Route::get('/admin/user/show/{id}', [
            'as' => 'user-show',
            'uses' => 'Admin\UserController@show'
        ]);

    });


});