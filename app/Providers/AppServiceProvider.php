<?php

namespace App\Providers;

use App\Http\Livewire\Beneficiario_celSearch;
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
        Livewire::component('beneficiario_cel-search', Beneficiario_celSearch::class);
    }
}
