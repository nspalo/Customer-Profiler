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
     * @param CreateCustomerRequestInterface $createCustomerRequest
     * @return Customer
     * @throws \Exception
     */
    public function handle(CreateCustomerRequestInterface $createCustomerRequest): Customer
    {
        return new Customer(
            $createCustomerRequest->getEmailAddress(),
            $createCustomerRequest->getFirstName(),
            $createCustomerRequest->getLastName(),
            $createCustomerRequest->getUsername(),
            $createCustomerRequest->getPassword(),
            $createCustomerRequest->getGender(),
            $createCustomerRequest->getPhone(),
            $createCustomerRequest->getCity(),
            $createCustomerRequest->getCountry()
        );
    }
}
