<?php
Route::middleware(['auth'])->group(function () {
    Route::group(['namespace' => 'Profile'], function() {

        Route::view('/profile', 'profile.profile')->middleware('permission:read-profile');
        Route::view('/password', 'profile.password')->middleware('permission:read-profile-password');

        // api
        Route::group(['prefix' => 'api/profile'], function() {
            Route::get('/getAuthUser', 'ProfileController@getAuthUser')->middleware('permission:read-profile');
            Route::post('/uploadAvatarAuthUser', 'ProfileController@uploadAvatarAuthUser')->middleware('permission:update-profile');
            Route::post('/removeAvatarAuthUser', 'ProfileController@removeAvatarAuthUser')->middleware('permission:update-profile');
        });
    });
});
