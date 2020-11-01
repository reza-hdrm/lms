<?php

Route::group(["namespace" => "Reza_hdrm\Category\Http\Controllers", 'middleware' => ['web', 'auth', 'verified']], function ($router) {
    $router->resource('categories', 'CategoryController')->middleware('permission:manage categories');
});
