<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider;

abstract class BaseModule extends ServiceProvider
{
    /**
     * The module name.
     */
    protected string $moduleName;

    /**
     * The module directory.
     */
    protected string $moduleDirectory;

    /**
     * Create a new service provider instance.
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->moduleDirectory = dirname((new \ReflectionClass($this))->getFileName());
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register module-specific services
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutes();
    }

    /**
     * Load the module routes.
     */
    protected function loadRoutes(): void
    {
        if (file_exists($this->moduleDirectory . '/Routes/api.php')) {
            $this->loadRoutesFrom($this->moduleDirectory . '/Routes/api.php');
        }

        if (file_exists($this->moduleDirectory . '/Routes/web.php')) {
            $this->loadRoutesFrom($this->moduleDirectory . '/Routes/web.php');
        }
    }
}