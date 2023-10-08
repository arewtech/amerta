<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // function boot() ini untuk apa ?
        // untuk membuat directive baru di blade, jadi kita bisa membuat directive sendiri,
        // misal kita membuat directive baru dengan nama currency, maka kita bisa menggunakan directive tersebut di blade dengan cara @currency($expression)
        Blade::directive("currency", function ($expression) {
            return "<?php echo number_format($expression, 0, ',', '.'); ?>";
        });
        Paginator::useBootstrapFive();
    }
}
