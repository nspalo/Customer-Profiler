<?php

namespace App\Console\Commands\DataImport;

use App\Services\Customers\CollectCustomerDataService;
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
     * @var CollectCustomerDataService
     */
    private $collectCustomerDataService;

    /**
     * Create a new command instance.
     *
     * @param CollectCustomerDataService $collectCustomerDataService
     */
    public function __construct(CollectCustomerDataService $collectCustomerDataService)
    {
        parent::__construct();
        $this->collectCustomerDataService = $collectCustomerDataService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "fetching data..." . PHP_EOL;

        $response = $this->fetchCustomerData();
        $this->collectCustomerDataService->handle($response["results"]);

        echo "Total number of data fetch: " . count($response["results"]);
    }

    /**
     * @return mixed
     */
    private function fetchCustomerData()
    {
        $filterHeadCount = 100;
        $filterNationality = "au";
        $filterFields   = "email,name,gender,phone,login,location,nat";
        $apiQueryString = "?results={$filterHeadCount}&nat={$filterNationality}&inc={$filterFields}&noinfo";
        $apiEndpoint    = "https://randomuser.me/api".$apiQueryString;

        $response = file_get_contents($apiEndpoint);

        return json_decode($response, true);
    }
}
