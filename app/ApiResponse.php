<?php

namespace App;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function successResponse(
        mixed $data = null, 
        string $message,
        int $code
    )
    {
        return response()->json(
            [
                'success' => true,
                'message' => $message,
                'data' => $data ?? null
            ],
            $code
        );
    }

    public function errorResponse(
        string $message,
        int $code
    )
    {
        return response()->json(
            [
                'success' => false,
                'message' => $message,
            ],
            $code
        );
    }

    public function errorValidation(
        mixed $errors
    ): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => 'Error validation',
                'errors' => $errors
            ],
            422
        );
    }
}
