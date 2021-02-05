<?php

namespace App\Http\Controllers;

use App\Database\Renderers\Customer\CustomerRenderer;
use App\Database\Repositories\Customer\CustomerRepositoryInterface;
use App\Database\Repositories\Customer\CustomerRepository;
use Illuminate\Http\JsonResponse;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @var CustomerRenderer
     */
    private $customerRenderer;

    /**
     * CustomerController constructor.
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerRenderer $customerRenderer
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        CustomerRenderer $customerRenderer
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerRenderer = $customerRenderer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (null === ($customers = $this->customerRepository->findAllForSummaryView())) {
            return $this->errorResponse(
                ['message' => \sprintf('No Available Customer Data.')],
                404
            );
        }

        return $this->successfulResponse(
            $customers
        );
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (null === ($customer = $this->customerRepository->findById($id))) {
            return $this->errorResponse(
                ['message' => \sprintf('Customer [%s] not found', $id)],
                404
            );
        }

        return $this->successfulResponse(
            $this->customerRenderer->render($customer)
        );
    }
}
