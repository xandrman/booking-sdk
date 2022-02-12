<?php

namespace Xandrman\BookingSdk;

use Illuminate\Support\ServiceProvider;

class BookingSdkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(BookingSdkInterface::class, BookingSdkService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'booking-sdk');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}