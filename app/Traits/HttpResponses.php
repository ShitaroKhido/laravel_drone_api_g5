<?php

namespace App\Traits;

trait HttpResponses
{
    protected function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Successfully!',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    protected function error($data, $message = null, $code = null)
    {
        return response()->json([
            'status' => 'unsuccessful!',
            'message' => $message,
            'error' => $data,
        ], $code);
    }
}
