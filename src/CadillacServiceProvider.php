<?php

namespace Qsnh\Cadillac;

use Illuminate\Support\ServiceProvider;

class CadillacServiceProvider extends ServiceProvider
{

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Cadillac::class,
            ]);
        }
    }

}