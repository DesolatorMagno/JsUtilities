<?php

namespace DesolatorMagno\JsUtilities;

use Illuminate\Support\ServiceProvider;

class JsUtilitiesServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views');

    }

    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {

    }
}
