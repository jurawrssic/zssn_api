<?php

namespace App\API;
use App\API\ApiError;

class ApiError
{
    public static function errorMessage($message, $code)
    {
        return[
            'data' => [
                'msg' => $message,
                'code' => $code
            ]
        ];
    }
}