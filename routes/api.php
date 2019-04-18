<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('device-types', 'DeviceTypeApiController');

    Route::apiResource('sectors', 'SectorsApiController');

    Route::apiResource('devices', 'DevicesApiController');

    Route::apiResource('teams', 'TeamApiController');
});
