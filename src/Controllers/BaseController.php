<?php

namespace Src\Controllers;

abstract class BaseController
{
    public function successResponse($response, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        return json_encode($response);
    }

    public function errorResponse($response, $status = 400)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        return json_encode($response);
    }
}