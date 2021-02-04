<?php

namespace App\Services\Customers;

/**
 * Class CustomerDTO
 * - Customer Data Transfer Object
 *
 * @package App\Services\Customers
 */
class CustomerDataTransferObject implements CustomerDataInterface
{
    protected $emailAddress;
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $password;
    protected $gender;
    protected $phone;
    protected $city;
    protected $country;

    public function __construct(array $customerInfo)
    {
        $this->emailAddress = $customerInfo["email"];
        $this->firstName = $customerInfo["name"]["first"];
        $this->lastName = $customerInfo["name"]["last"];
        $this->username = $customerInfo["login"]["username"];
        $this->password = $customerInfo["login"]["password"];
        $this->gender = $customerInfo["gender"];
        $this->phone = $customerInfo["phone"];
        $this->city = $customerInfo["location"]["city"];
        $this->country = $customerInfo["location"]["country"];
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
}
