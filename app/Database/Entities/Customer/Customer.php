<?php

namespace App\Database\Entities\Customer;

use App\Database\Enums\Gender;
use App\Traits\PasswordEncryption;
use Doctrine\ORM\Mapping as ORM;
use App\Database\Entities\Entity;

/**
 * Class Customer
 * @package App\Database\Entities\Customer
 * @ORM\Entity
 */
class Customer extends Entity
{
    use PasswordEncryption;

    /**
     * Email address
     *
     * @ORM\Column(type="string", length=128, unique=true, nullable=false)
     * @var string
     */
    protected $emailAddress;

    /**
     * First Name
     *
     * @ORM\Column(type="string", length=64, unique=false, nullable=false)
     * @var string
     */
    protected $firstName;

    /**
     * Last Name
     *
     * @ORM\Column(type="string", length=64, unique=false, nullable=false)
     * @var string
     */
    protected $lastName;

    /**
     * Username
     *
     * @ORM\Column(name="username", type="string", length=32, unique=false, nullable=false)
     * @var string
     */
    protected $username;

    /**
     *  Password
     *
     * @ORM\Column(name="password", type="string", length=255, unique=false, nullable=false)
     * @var string
     */
    protected $password;

    /**
     * Gender - Male|Female|Other
     *
     * @ORM\Embedded(class = "App\Database\Enums\Gender")
     * @var Gender $gender
     */
    protected $gender;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $city;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $country;

    /**
     * Customer constructor.
     * @param string $emailAddress
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $password
     * @param string $gender
     * @param string $phone
     * @param string $city
     * @param string $country
     * @throws \Exception
     */
    public function __construct(
        string $emailAddress,
        string $firstName,
        string $lastName,
        string $username,
        string $password,
        string $gender,
        string $phone,
        string $city,
        string $country
    )
    {
        $this->setEmailAddress($emailAddress);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setGender($gender);
        $this->setPhone($phone);
        $this->setCity($city);
        $this->setCountry($country);
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     * @throws \Exception
     */
    public function setEmailAddress(string $emailAddress): void
    {
        if (empty($emailAddress)) {
            throw new \Exception('Email address cannot be empty.');
        }

        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Email address in not valid.');
        }

        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws \Exception
     */
    public function setFirstName(string $firstName): void
    {
        if (empty($firstName)) {
            throw new \Exception("First Name is required.");
        }

        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws \Exception
     */
    public function setLastName(string $lastName): void
    {
        if (empty($lastName)) {
            throw new \Exception("Last Name is required.");
        }

        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        if (empty($username)) {
            throw new \Exception("Username is required.");
        }

        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        if (empty($password)) {
            throw new \Exception("Password is required.");
        }

        $this->password = $this->encryptWithMD5($password);
    }

    /**
     * @return Gender
     */
    public function getGenderObject(): Gender
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->getGenderObject()->getSelectedOption();
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = Gender::findByValue($gender);
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
}
