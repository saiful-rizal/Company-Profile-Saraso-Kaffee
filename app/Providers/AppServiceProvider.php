<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Order;

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
        View::composer('*', function ($view) {
            $pendingOrderCount = Auth::check()
                ? Order::where('user_id', Auth::id())->where('status', 'pending')->count()
                : 0;
            $view->with('pendingOrderCount', $pendingOrderCount);
        });
    }
}
