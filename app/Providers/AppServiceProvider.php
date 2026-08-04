<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PurchaseRequest;
use App\Policies\PurchaseRequestPolicy;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [

        PurchaseRequest::class => PurchaseRequestPolicy::class,

    ];
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
        //
    }
}
