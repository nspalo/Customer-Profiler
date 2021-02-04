<?php

namespace App\Services\Customers;

use App\Database\Entities\Customer\Customer;

/**
 * Class CreateCustomerService
 * @package App\Services\Customers
 */
class UpdateCustomerService extends AbstractCustomerService
{
    /**
     * @param Customer $customer
     * @param CustomerDataInterface $customerData
     * @return Customer
     * @throws \Exception
     */
    public function handle(Customer $customer, CustomerDataInterface $customerData): Customer
    {
        $customer->setEmailAddress($customerData->getEmailAddress());
        $customer->setFirstName($customerData->getFirstName());
        $customer->setLastName($customerData->getLastName());
        $customer->setUsername($customerData->getUsername());
        $customer->setPassword($customerData->getPassword());
        $customer->setGender($customerData->getGender());
        $customer->setPhone($customerData->getPhone());
        $customer->setCity($customerData->getCity());
        $customer->setCountry($customerData->getCountry());
        $this->entityManager->persist($customer);

        return $customer;
    }
}
