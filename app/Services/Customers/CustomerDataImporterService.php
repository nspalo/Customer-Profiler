<?php

namespace App\Services\Customers;

use App\Database\Entities\Customer\Customer;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

/**
 * Class CustomerDataCollectionService
 * - Data Collection using Random User Generator API
 *
 * @package App\Services\Customers
 */
class CustomerDataImporterService extends AbstractCustomerService implements DataImporterInterface
{
    /**
     * @var CreateCustomerService
     */
    private $createCustomerService;
    /**
     * @var UpdateCustomerService
     */
    private $updateCustomerService;

    /**
     * @param array $customerInfo
     * @return Customer
     * @throws \Exception
     */
    private function importCustomer(array $customerInfo) : Customer
    {

        $customer = $this->entityManager->getRepository(Customer::class)->findOneBy(['emailAddress' => $customerInfo["email"]]);

        try {

            $customerDTO = new CustomerDataTransferObject($customerInfo);

            if(is_null($customer)) {
                echo "Create data for: " . $customerDTO->getEmailAddress() . PHP_EOL;
                $customer = $this->createCustomerService->handle($customerDTO);
            } else {
                echo "Update data for: " . $customer->getEmailAddress() . PHP_EOL;
                $customer = $this->updateCustomerService->handle($customer, $customerDTO);
            }

            $this->entityManager->persist($customer);

        } catch (ORMException $e) {
            throw new \RuntimeException($e->getMessage());
        }

        return $customer;

    }

    /**
     * CustomerDataCollectionService constructor.
     * @param EntityManager $entityManager
     * @param CreateCustomerService $createCustomerService
     * @param UpdateCustomerService $updateCustomerService
     */
    public function __construct(EntityManager $entityManager, CreateCustomerService $createCustomerService, UpdateCustomerService $updateCustomerService)
    {
        parent::__construct($entityManager);
        $this->createCustomerService = $createCustomerService;
        $this->updateCustomerService = $updateCustomerService;
    }

    /**
     * @param array $customers
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     */
    public function import(array $customers): void
    {

        foreach ($customers as $customer) {
            $this->importCustomer($customer);
        }

        $this->entityManager->flush();
    }
}
