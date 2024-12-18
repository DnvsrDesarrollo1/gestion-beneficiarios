<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Livewire\Livewire;
use App\Http\Livewire\BeneficiarioSearch;

use App\Services\ManifestService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ManifestService::class, function ($app) {
            return new ManifestService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Livewire::component('beneficiario-search', BeneficiarioSearch::class);
    }
}
