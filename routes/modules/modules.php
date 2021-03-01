<?php
Route::middleware(['auth', 'c-panel-access'])->group(function () {
    Route::group(['namespace' => 'Modules'], function() {
        // api
        Route::group(['prefix' => 'api/modules'], function() {
            Route::get('/getModulesPermissions', 'ModuleController@getModulesPermissions');
        });
    });
});
