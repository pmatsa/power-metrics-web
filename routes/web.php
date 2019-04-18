<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('device-types/destroy', 'DeviceTypeController@massDestroy')->name('device-types.massDestroy');

    Route::resource('device-types', 'DeviceTypeController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::delete('device-types/destroy', 'DeviceTypeController@massDestroy')->name('device-types.massDestroy');

    Route::resource('device-types', 'DeviceTypeController');

    Route::delete('sectors/destroy', 'SectorsController@massDestroy')->name('sectors.massDestroy');

    Route::resource('sectors', 'SectorsController');

    Route::delete('devices/destroy', 'DevicesController@massDestroy')->name('devices.massDestroy');

    Route::resource('devices', 'DevicesController');

    Route::delete('audit-logs/destroy', 'AuditLogsController@massDestroy')->name('audit-logs.massDestroy');

    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');

    Route::resource('teams', 'TeamController');

    //route for device metrics
    Route::post('devices/metrics/{id}', ['uses' => 'Admin\DevicesController@showMetrics', 'as' => 'device.metrics']);
});
