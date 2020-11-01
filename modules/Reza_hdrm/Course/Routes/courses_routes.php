<?php
Route::group(["namespace" => "Reza_hdrm\Course\Http\Controllers", 'middleware' => ['web', 'auth', 'verified']], function ($router) {
    $router->resource('courses', 'CourseController');
});
