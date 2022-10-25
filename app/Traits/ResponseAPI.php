<?php

namespace App\Traits;

trait ResponseAPI
{
    /**
     * @param $message
     * @param $data
     * @param $statusCode
     * @param $isSuccess
     * @return \Illuminate\Http\JsonResponse
     */
    public function coreResponse($message, $data = [], $statusCode, $isSuccess = true)
    {
        // Check the params
        if (!$message) return response()->json(['message' => 'Message is required'], 500);

        // Send the response
        if ($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'code' => $statusCode,
                'result' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'code' => $statusCode,
            ], $statusCode);
        }
    }

    /**
     * @param $message
     * @param $data
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($message, $data, $statusCode = 200)
    {
        return $this->coreResponse($message, $data, $statusCode);
    }

    /**
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $statusCode = 500)
    {
        return $this->coreResponse($message, null, $statusCode, false);
    }

}
