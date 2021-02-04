<?php

namespace App\Providers;

use App\Services\Customers\CustomerDataInterface;
use App\Services\Customers\CustomerDataCollectionInterface;
use App\Services\Customers\CustomerDataCollectionService;
use App\Services\Customers\CustomerDataTransferObject;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class FlexisourceItServiceProvider extends ServiceProvider
{
    protected $components = [
        [
            'serviceInterface' => CustomerDataCollectionInterface::class,
            'serviceClass' => CustomerDataCollectionService::class
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
        foreach ($this->components as $aComponents)
        {
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
