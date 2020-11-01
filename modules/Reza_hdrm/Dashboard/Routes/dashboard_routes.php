<?php
Route::group(['namespace' => 'Reza_hdrm\Dashboard\Http\Controllers', 'middleware' => ['web','auth', 'verified']], function ($router) {
    $router->get('home', 'DashboardController@home')->name('home');
});
