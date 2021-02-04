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
class CustomerDataCollectionService extends AbstractCustomerService implements CustomerDataCollectionInterface
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

    public function fetchData()
    {
        $filterHeadCount = 100;
        $filterNationality = "au";
        $filterFields   = "email,name,gender,phone,login,location,nat";
        $apiQueryString = "?results={$filterHeadCount}&nat={$filterNationality}&inc={$filterFields}&noinfo";
        $apiEndpoint    = "https://randomuser.me/api" . $apiQueryString;

        $response = file_get_contents($apiEndpoint);

        return json_decode($response, true)["results"];
    }

    public function importData(array $customerInfo) : Customer
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

    public function handle(): void
    {
        $customers = $this->fetchData();

        foreach ($customers as $customer)
        {
            $this->importData($customer);
        }

        $this->entityManager->flush();
    }


}
