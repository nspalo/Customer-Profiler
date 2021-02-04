<?php

namespace App\Services\Customers;

use Doctrine\ORM\EntityManager;

/**
 * Class AbstractCustomerService
 * @package App\Services\Customers
 */
abstract class AbstractCustomerService
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * AbstractCustomerService constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

}
