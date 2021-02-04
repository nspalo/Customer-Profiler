<?php

namespace App\Database\Renderers\Customer;

use App\Database\Entities\Customer\Customer;
use App\Database\Renderers\Render;

/**
 * Class CustomerRenderer
 * @package App\Database\Renders\Customer
 */
class CustomerRenderer extends Render
{
    /**
     * @param Customer $customer
     * @return array
     */
    public function render(Customer $customer): array
    {
        return [
            'id' => $customer->getId(),
            'emailAddress' => $customer->getEmailAddress(),
            'fullname' => $customer->getFirstName() . " " . $customer->getLastName(),
            // 'firstName' => $customer->getFirstName(),
            // 'lastName' => $customer->getLastName(),
            'username' => $customer->getUsername(),
            'gender' => $customer->getGender(),
            'phone' => $customer->getPhone(),
            'city' => $customer->getCity(),
            'country' => $customer->getCountry()
        ];
    }
}
