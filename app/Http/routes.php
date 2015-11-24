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

//Route::get('/', function () {
//    return view('inicio');
//});
Route::get('/',['as'=>'inicio', function () {
    return view('inicio');
}]);

Route::post('login',['as'=>'login', 'uses'=>'LoginController@login']);
Route::get('logout',['as'=>'logout', 'uses'=>'LoginController@logout']);

Route::group(['prefix' => 'invitados'], function () {
    Route::get('principal',['as'=>'invitadosPrincipal', 'uses'=>'InvitadosController@principal']);
    Route::get('invitados',['as'=>'invitados', 'uses'=>'InvitadosController@findAll']);
    Route::get('invitado',['as'=>'invitado', 'uses'=>'InvitadosController@principal']);
    Route::post('invitado',['uses'=>'InvitadosController@save']);
    Route::get('invitaciones',['as'=>'invitaciones', 'uses'=>'InvitadosController@invitaciones']);
    Route::post('invitado/invitacion',['uses'=>'InvitadosController@invitacion']);
});

Route::group(['prefix' => 'integrantes'], function () {
    Route::get('principal',['as'=>'integrantesPrincipal', 'uses'=>'IntegrantesController@principal']);
    Route::get('integrantes',['as'=>'integrantes', 'uses'=>'IntegrantesController@findAll']);
    Route::get('integrante',['as'=>'integrante', 'uses'=>'IntegrantesController@principal']);
    Route::post('integrante',['uses'=>'IntegrantesController@save']);
});
Route::group(['prefix' => 'catalogos', 'middleware'=>'auth'], function () {
    Route::get('formasPago',['as'=>'formasPago', 'uses'=>'CatalogosController@formasPagoView']);
    Route::get('formaPago',['as'=>'formaPago', 'uses'=>'CatalogosController@getAllFormasPago']);
    Route::post('formaPago','CatalogosController@addFormaPago');
    Route::put('formaPago','CatalogosController@updateFormaPago');
    Route::delete('formaPago/{id}','CatalogosController@deleteFormaPago');
    
    Route::get('proveedores',['as'=>'proveedores', 'uses'=>'CatalogosController@proveedoresView']);
    Route::get('proveedor',['as'=>'proveedor', 'uses'=>'CatalogosController@getAllProveedores']);
    Route::post('proveedor','CatalogosController@addProveedor');
    Route::put('proveedor','CatalogosController@updateProveedor');
    Route::delete('proveedor/{id}','CatalogosController@deleteProveedor');
    
    Route::get('roles',['as'=>'roles', 'uses'=>'CatalogosController@rolesView']);
    Route::get('rol',['as'=>'rol', 'uses'=>'CatalogosController@getAllRoles']);
    Route::post('rol','CatalogosController@addRol');
    Route::put('rol','CatalogosController@updateRol');
    Route::delete('rol/{id}','CatalogosController@deleteRol');
    
    Route::get('servicios',['as'=>'servicios', 'uses'=>'CatalogosController@serviciosView']);
    Route::get('servicio',['as'=>'servicio', 'uses'=>'CatalogosController@getAllServicios']);
    Route::post('servicio','CatalogosController@addServicio');
    Route::put('servicio','CatalogosController@updateServicio');
    Route::delete('servicio/{id}','CatalogosController@deleteServicio');
    
    Route::get('ubicaciones',['as'=>'ubicaciones', 'uses'=>'CatalogosController@ubicacionesView']);
    Route::get('ubicacion',['as'=>'ubicacion', 'uses'=>'CatalogosController@getAllUbicaciones']);
    Route::post('ubicacion','CatalogosController@addUbicacion');
    Route::put('ubicacion','CatalogosController@updateUbicacion');
    Route::delete('ubicacion/{id}','CatalogosController@deleteUbicacion');
});
