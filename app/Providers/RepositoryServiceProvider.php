<?php

namespace App\Providers;

use Doctrine\ORM\EntityManager;
use Illuminate\Support\ServiceProvider;
use App\Database\Entities\Customer\Customer;
use App\Database\Repositories\Customer\CustomerRepository;
use App\Database\Repositories\Customer\CustomerRepositoryInterface;


/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        [
            'interface' => CustomerRepositoryInterface::class,
            'repository' => CustomerRepository::class,
            'entity' => Customer::class
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $aRepository) {
            $this->app->bind($aRepository['interface'], function ($app) use ($aRepository) {
                /** @var EntityManager $entityManager */
                $entityManager = $app['em'];
                return new $aRepository['repository'](
                    $entityManager,
                    $entityManager->getClassMetaData($aRepository['entity'])
                );
            });
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
