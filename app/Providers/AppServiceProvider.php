<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // run view_composer_all
        $this->view_composer_all();
    }

    /**
     * view_composer_all
     *
     * @return extienda data a las vistas
     */
    public function view_composer_all()
    {
        view()->composer('*', function ($view) {
            $view->with('user_count', User::count());
            $view->with('client_count', Client::count());
            $view->with('agent_count', Agent::count());
            $view->with('invoice_count', Invoice::count());
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
