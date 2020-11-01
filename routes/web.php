<?php

use Illuminate\Support\Facades\Route;
use Reza_hdrm\User\Models\User;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/test', function () {
    //\Spatie\Permission\Models\Permission::create(['name' => 'manage categories']);
    /*auth()->user()->givePermissionTo('manage categories');
    return auth()->user()->permissions;*/
});

