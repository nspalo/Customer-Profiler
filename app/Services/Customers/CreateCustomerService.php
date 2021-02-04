<?php

namespace App\Services\Customers;

use App\Database\Entities\Customer\Customer;

/**
 * Class CreateCustomerService
 * @package App\Services\Customers
 */
class CreateCustomerService
{
    /**
     * @param CustomerDataInterface $customerData
     * @return Customer
     * @throws \Exception
     */
    public function handle(CustomerDataInterface $customerData): Customer
    {
        return new Customer(
            $customerData->getEmailAddress(),
            $customerData->getFirstName(),
            $customerData->getLastName(),
            $customerData->getUsername(),
            $customerData->getPassword(),
            $customerData->getGender(),
            $customerData->getPhone(),
            $customerData->getCity(),
            $customerData->getCountry()
        );
    }
}
