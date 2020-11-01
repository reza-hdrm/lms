<?php
Route::group(["namespace" => "Reza_hdrm\RolePermissions\Http\Controllers", 'middleware' => ['web', 'auth', 'verified']], function ($router) {
    $router->resource('role-permissions', 'RolePermissionsController')->middleware('permission:manage role_permissions');
});
