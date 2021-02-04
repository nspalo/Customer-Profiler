<?php

namespace App\Services\Customers;

/**
 * Interface DataImporterInterface
 * @package App\Services\Customers
 */
interface DataImporterInterface
{
    public function import(array $customers);
}
