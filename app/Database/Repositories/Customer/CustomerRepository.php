<?php

namespace App\Database\Repositories\Customer;

use Doctrine\ORM\EntityRepository;

/**
 * Class CustomerRepository
 * @package App\Database\Repositories\Customer
 */
class CustomerRepository extends EntityRepository implements CustomerRepositoryInterface
{
    /**
     * @param $id
     * @return object|null
     */
    public function findById($id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * Return All Customer, showing only fullname, email, country
     *
     * @return int|mixed|string
     */
    public function findAllForSummaryView()
    {
        $fields = "CONCAT(c.firstName, ' ', c.lastName) AS fullname, c.emailAddress, c.country";

        return
            $this->createQueryBuilder("c")
                ->select($fields)
                ->getQuery()
                ->getResult();
    }
}
