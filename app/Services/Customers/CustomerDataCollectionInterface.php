<?php

namespace App\Services\Customers;

/**
 * Interface CustomerDataCollectionInterface
 * @package App\Services\Customers
 */
interface CustomerDataCollectionInterface
{
    public function fetchData();
    public function importData(array $customerInfo);
}
