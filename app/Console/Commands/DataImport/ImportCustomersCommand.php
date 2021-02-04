<?php

namespace App\Console\Commands\DataImport;

use App\Services\Customers\CustomerDataCollectionInterface;
use App\Services\Customers\CustomerDataCollectionService;
use Illuminate\Console\Command;

/**
 * Class CreateCustomer
 * @package App\Console\Commands\DataImport
 */
class ImportCustomersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flexisourceit:customers:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store a minimum of 100 users from a 3rd party data provider api.';
    /**
     * @var CustomerDataCollectionService
     */
    private $customerDataCollectionService;

    /**
     * Create a new command instance.
     *
     * @param CustomerDataCollectionInterface $collectCustomerDataService
     */
    public function __construct(CustomerDataCollectionInterface $collectCustomerDataService)
    {
        parent::__construct();
        $this->customerDataCollectionService = $collectCustomerDataService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "fetching data..." . PHP_EOL;

        $this->customerDataCollectionService->handle();

        echo "Data collection completed!";
    }

}
