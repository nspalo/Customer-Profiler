<?php

namespace App\Services\Customers;

use Doctrine\ORM\EntityManager;

/**
 * Class CollectCustomerDataService
 * @package App\Services\Customers
 */
class CollectCustomerDataService
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * CollectCustomerDataService constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(array $customers): void
    {
        foreach ($customers as $customer)
        {
            $this->import($customer);
        }
    }

    public function import(array $customer): void
    {
        echo "--------" . PHP_EOL;
        dump($customer);
    }
}
