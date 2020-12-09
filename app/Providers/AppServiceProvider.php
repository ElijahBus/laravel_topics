<?php

namespace App\Providers;

use App\PostcardService;
use App\User;
use Illuminate\Support\Facades\View;
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
        $this->app->singleton('Postcard', function ($app) {
            return new PostcardService('DRC', 5,5);
        });

        // do not share data between views unless for a good reason,
        // since it will always hit the server, making a request for geeting the data
        // view()->share('key', $value);

        view()->composer(['home', 'welcome'], function ($view) {
            $view->with('users', User::all());
        });
    }
}
