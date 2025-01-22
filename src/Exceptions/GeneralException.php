<?php

namespace UbtAshton\Lightspeed\Exceptions;

use Exception;

class GeneralException extends Exception
{
    public function __construct($message = "An error occurred", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}