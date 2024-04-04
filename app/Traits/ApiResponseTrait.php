<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ApiResponseTrait
{
    public function successResponse($data, $msg = null, $status = 200)
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

    public function validateRequest(Request $request, $rules)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->successResponse(null, $validator->errors()->toJson(), 400);
        }
    }
}
