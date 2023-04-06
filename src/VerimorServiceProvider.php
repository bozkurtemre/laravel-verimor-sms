<?php

namespace Emrebbozkurt\VerimorSms;

use Illuminate\Support\ServiceProvider;

class VerimorServiceProvider extends ServiceProvider
{
    protected $configPath = __DIR__ . '/../config/verimor.php';

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath => config_path('verimor.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath, 'verimor');

        $this->app->singleton(VerimorSms::class, function ($app) {
            return new VerimorSms($app['config']['verimor']);
        });

         $this->app->alias(VerimorSms::class, 'verimor');
    }
}
