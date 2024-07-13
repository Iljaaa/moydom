<?php

namespace App\Providers;

use App\Services\Cadastre\CadastreService;
use App\Services\Cadastre\Rosreestr\Impl\RosReesterParser;
use App\Services\Cadastre\Rosreestr\Impl\RosReestrClient;
use App\Services\Cadastre\Rosreestr\RosReestrService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CadastreService::class, function (){
            return new RosReestrService(new RosReestrClient(), new RosReesterParser());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
