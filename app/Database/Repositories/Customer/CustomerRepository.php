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
}
