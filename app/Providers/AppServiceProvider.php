<?php

namespace App\Providers;
use Livewire\Livewire;
use App\Http\Livewire\BeneficiarioSearch;

use App\Services\ManifestService;
use App\Services\BeneficiarioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /*$this->app->singleton(ManifestService::class, function ($app) {
            return new ManifestService();
        });*/
        $this->app->singleton(BeneficiarioService::class, function ($app) {
            return new BeneficiarioService();
        });
    }
    public function boot(): void
    {
        //Paginator::useBootstrapFive();
        Livewire::component('beneficiario-search', BeneficiarioSearch::class);

    }


}
