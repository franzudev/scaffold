<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/', 'welcome')->name('homepage');

Route::get('/ft-admin', 'DashboardController@index')->name('home')->middleware(['auth', 'verified', 'c-panel-access']);
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware(['auth', 'verified', 'c-panel-access']);

require __DIR__ . '/profile/profile.php';
require __DIR__ . '/users/users.php';
require __DIR__ . '/roles/roles.php';
require __DIR__ . '/roles/permissions.php';
require __DIR__ . '/modules/modules.php';

/*->except([
    'create', 'store', 'update', 'destroy'
]);*/
