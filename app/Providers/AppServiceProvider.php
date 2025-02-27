<?php

namespace App\Providers;
use Livewire\Livewire;
use App\Livewire\BeneficiarioSearch;
use App\Services\ManifestService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Livewire::component('beneficiario-search', BeneficiarioSearch::class);
    }


}
