<?php

namespace App\Providers;

use App\Services\Customers\CustomerDataCollectorService;
use App\Services\Customers\CustomerDataImporterService;
use App\Services\Customers\CustomerDataInterface;
use App\Services\Customers\CustomerDataTransferObject;
use App\Services\Customers\DataCollectorInterface;
use App\Services\Customers\DataImporterInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class FlexisourceItServiceProvider extends ServiceProvider
{
    protected $components = [
        [
            'serviceInterface' => DataCollectorInterface::class,
            'serviceClass' => CustomerDataCollectorService::class
        ],
        [
            'serviceInterface' => DataImporterInterface::class,
            'serviceClass' => CustomerDataImporterService::class
        ],
        [
            'serviceInterface' => CustomerDataInterface::class,
            'serviceClass' => CustomerDataTransferObject::class
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->components as $aComponents) {
            $this->app->bind($aComponents['serviceInterface'], $aComponents['serviceClass']);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
