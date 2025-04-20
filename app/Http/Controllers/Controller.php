<?php

namespace App\Http\Controllers;

use Exception;

abstract class Controller
{
    protected function formatError(Exception $e): array
    {
        return [
            'message' => 'Internal Server Error',
            'desc' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ];
    }
}
