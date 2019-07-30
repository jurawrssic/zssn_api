<?php

namespace App\API;
use App\API\ApiSucess;

class ApiSucess
{
    public static function sucessMessage($message, $code)
    {
        return[
            'data' => [
                'msg' => $message,
                'code' => $code
            ]
        ];
    }
}