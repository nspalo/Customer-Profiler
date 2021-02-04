<?php

namespace App\Services\Customers;

/**
 * Class CustomerDataCollectionService
 * - Data Collection using Random User Generator API
 *
 * @package App\Services\Customers
 */
class CustomerDataCollectorService implements DataCollectorInterface
{
    /**
     * @return mixed
     */
    public function fetch()
    {
        $filterHeadCount = 100;
        $filterNationality = "au";
        $filterFields   = "email,name,gender,phone,login,location,nat";
        $apiQueryString = "?results={$filterHeadCount}&nat={$filterNationality}&inc={$filterFields}&noinfo";
        $apiEndpoint    = "https://randomuser.me/api" . $apiQueryString;

        $response = file_get_contents($apiEndpoint);

        return json_decode($response, true)["results"];
    }
}
