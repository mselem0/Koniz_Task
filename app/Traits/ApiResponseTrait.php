<?php

namespace App\Traits;

trait ApiResponseTrait
{
    public function successResponse($data, $msg = null, $status  = 200)
    {
        return response()->json([
           'data' => $data,
           'message' => $msg,
           'status' => $status
        ], $status);
    }
    public function failResponse($msg = null, $status = 500)
    {
        return response()->json([
            'message' => $msg,
            'status' => $status
        ], $status);
    }
}
