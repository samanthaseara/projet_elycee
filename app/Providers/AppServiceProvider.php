<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('tags', function ($attribute, $value, $parameters, $validator) {
            if (!is_array($value)) return false;
            foreach ($value as $item) if (!is_numeric($item)) return false;
            return true;
        });
        Validator::replacer('tags', function($message, $attribute, $rule, $parameters)
        {
            return "Un problème est servenu dans l'ajout des tags recommencer";
        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}