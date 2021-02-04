<?php

namespace App\Services\Customers;

/**
 * Interface CreateCustomerRequestInterface
 * @package App\Services\Customers
 */
interface CustomerDataInterface
{
    public function getEmailAddress();
    public function getFirstName();
    public function getLastName();
    public function getUsername();
    public function getPassword();
    public function getGender();
    public function getPhone();
    public function getCity();
    public function getCountry();
}

