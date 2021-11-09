<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Wp\Utility\Email\Events\SendEmailEvent;
use Wp\Utility\Email\Listeners\SendEmailListener;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SendEmailEvent::class => [
            SendEmailListener::class,
        ]
    ];
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
        //
    }
}
