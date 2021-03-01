<?php
Route::middleware(['auth', 'c-panel-access', 'verified'])->group(function () {
    Route::group(['namespace' => 'Users'], function() {
        // views
        Route::group(['prefix' => 'users'], function() {
            Route::view('/', 'users.index')->middleware('permission:read-users');
            Route::view('/create', 'users.create')->middleware('permission:create-users');
            Route::view('/{user}/edit', 'users.edit')->name('user.update')->middleware('permission:update-users');
        });

        // api
        Route::group(['prefix' => 'api/users'], function() {
            Route::get('/count', 'UserController@count');
            Route::post('/', 'UserController@store')->middleware('permission:create-users');
            Route::post('/filter', 'UserController@filter')->middleware('permission:read-users');
            Route::get('/role', 'UserController@isSuperAdmin');

            Route::get('/{user}', 'UserController@show')->middleware('permission:read-users');
            Route::put('/{user}', 'UserController@update')->middleware('permission:update-users');
            Route::delete('/{user}', 'UserController@destroy')->middleware('permission:delete-users');
        });
    });
});
