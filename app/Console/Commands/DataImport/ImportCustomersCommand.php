<?php

namespace App\Console\Commands\DataImport;

use App\Services\Customers\DataCollectorInterface;
use App\Services\Customers\DataImporterInterface;
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
     * @var DataCollectorInterface
     */
    private $customerDataCollectorService;

    /**
     * @var DataImporterInterface
     */
    private $customerDataImporterService;

    /**
     * Create a new command instance.
     * @param DataCollectorInterface $customerDataCollectorService
     * @param DataImporterInterface $customerDataImporterService
     */
    public function __construct(
        DataCollectorInterface $customerDataCollectorService,
        DataImporterInterface $customerDataImporterService
    )
    {
        parent::__construct();
        $this->customerDataCollectorService = $customerDataCollectorService;
        $this->customerDataImporterService = $customerDataImporterService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "fetching data..." . PHP_EOL;

        $this->customerDataImporterService->import(
            $this->customerDataCollectorService->fetch()
        );

        echo "Data collection completed!";
    }
}
