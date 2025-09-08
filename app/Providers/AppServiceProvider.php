<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Morilog\Jalali\Jalalian;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::macro('toJalali', function ($format = 'Y/m/d H:i') {
            return Jalalian::fromCarbon($this)->format($format);
        });
    }
}
