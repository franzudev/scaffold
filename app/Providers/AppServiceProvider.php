<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('olderThan', function($attribute, $value, $parameters)
        {
            $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 13;

            return Carbon::now()->diff(new Carbon($value))->y >= $minAge;
        });

        Validator::replacer('olderThan', function ($message, $attribute, $rule, $parameters) {
            return "Devi essere maggiorenne per registrarti";
        });
    }
}
