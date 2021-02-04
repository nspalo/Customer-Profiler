<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{

    /**
     * Return successful JSON response.
     *
     * @param array|null $data
     * @param int|null $status
     * @param array|null $headers
     *
     * @return JsonResponse
     */
    protected function toJsonResponse(?array $data = null, ?int $status = null, ?array $headers = null): JsonResponse
    {
        return \response()->json($data ?? [], $status ?? null, $headers ?? []);
    }

    /**
     * Return error JSON response.
     *
     * @param array|null $data
     * @param int|null $status
     * @param array|null $headers
     *
     * @return JsonResponse
     */
    protected function errorResponse(?array $data = null, ?int $status = null, ?array $headers = null): JsonResponse
    {
        return $this->toJsonResponse($data ?? [], $status ?? 400, $headers ?? []);
    }

    /**
     * Return successful JSON response.
     *
     * @param array|null $data
     * @param array|null $headers
     * @return JsonResponse
     */
    protected function successfulResponse(?array $data = null, ?array $headers = null): JsonResponse
    {
        return $this->toJsonResponse($data ?? [], 200, $headers ?? []);
    }
}
