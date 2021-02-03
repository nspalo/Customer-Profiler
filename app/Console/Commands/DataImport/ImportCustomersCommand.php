<?php

namespace App\Console\Commands\DataImport;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $filterHeadCount = 100;
        $filterNationality = "au";
        $filterFields   = "email,name,gender,phone,login,location,nat";
        $apiQueryString = "?results={$filterHeadCount}&nat={$filterNationality}&inc={$filterFields}&noinfo";
        $apiEndpoint    = "https://randomuser.me/api".$apiQueryString;

        echo "API Endpoint: " . $apiEndpoint . PHP_EOL;
        echo "fetching data..." . PHP_EOL;

        $response = file_get_contents($apiEndpoint);
        $response = json_decode($response, true);

        var_dump($response);

        echo "Total number of data fetch: " . count($response["results"]);
    }
}
