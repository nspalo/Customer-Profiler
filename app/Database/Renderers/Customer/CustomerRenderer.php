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
            'fullname' => $customer->getFirstName() . " " . $customer->getLastName(),
            'emailAddress' => $customer->getEmailAddress(),
            'username' => $customer->getUsername(),
            'gender' => $customer->getGender(),
            'country' => $customer->getCountry(),
            'city' => $customer->getCity(),
            'phone' => $customer->getPhone()
        ];
    }
}
