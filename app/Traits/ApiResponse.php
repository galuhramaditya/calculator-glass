<?php

namespace App\Traits;

trait ApiResponse
{
    public function sendSuccessResponse(string $message, $result, int $code = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $result
        ];
        return response()->json($response, $code);
    }
    public function sendErrorResponse(string $error, $errorMessages = [], int $code = 400)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];
        if (!empty($errorMessages)) {
            foreach ($errorMessages as $key => $value) {
                $response['data'][$key] = $value;
            }
        }
        return response()->json($response, $code);
    }
}
