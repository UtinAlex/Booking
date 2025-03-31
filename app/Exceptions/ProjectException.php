<?php

namespace App\Exceptions;

use RuntimeException;

class ProjectException extends RuntimeException
{
    public $api_error;

    public function __construct($message, $code, $api_error)
    {
        parent::__construct($message, $code);
        $this->api_error = $api_error;
    }
}

