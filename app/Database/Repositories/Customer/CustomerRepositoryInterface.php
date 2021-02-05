<?php

namespace App\Database\Repositories\Customer;

/**
 * Interface CustomerRepositoryInterface
 * @package App\Database\Repositories\Customer
 */
interface CustomerRepositoryInterface
{
    public function findById($id);
    public function findAllForSummaryView();
}
