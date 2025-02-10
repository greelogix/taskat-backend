<?php

namespace App\Traits;

trait ResponseTrait
{
    /**
     * Send a success response.
     */
    protected function successResponse($data = [], $message = 'Success', $status = 200)
    {
        dd('test');
        return response()->json([
            'success' => true,
            'message' => $message,
            'status'  => $status,
            'data'    => $data,
        ], $status);
    }
    

    /**
     * Send an error response.
     */
    protected function errorResponse($message = 'Error', $status = 400, $errors = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'status'  => $status,
            'errors'  => $errors,
        ], $status);
    }
    
    /**
     * Send a validation error response.
     */
    protected function validationErrorResponse($errors, $message = 'Validation Error', $status = 422)
    {
        return $this->errorResponse($message, $status, $errors);
    }
    
}
