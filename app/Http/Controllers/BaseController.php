<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BaseController extends Controller
{
    /**
     * @param array $payload
     * @param int $statusCode
     * @param string $message
     * @param array $headers
     * @return JsonResponse
     */
    public function response(array $payload = [], int $statusCode = ResponseAlias::HTTP_OK, string $message = 'OK', array $headers = ['Content-Type' => 'application/json',]): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'payload' => $payload,
        ], $statusCode, $headers);
    }
}
