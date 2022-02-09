<?php

namespace App\Exceptions;

use Exception;

class AppException extends Exception
{
    protected $cause = null;

    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 400, $cause = null, Exception $previous = null)
    {
        // some code
        $this->cause = $cause;

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message} {$this->cause}\n";
    }

    public function getCause()
    {
        return $this->cause;
    }

    public static function inst($message, $code = 500, $cause = null, Exception $previous = null)
    {
        return new self($message, $code, $cause, $previous);
    }

    public static function flash($code = 500, $message, $cause = null, Exception $previous = null)
    {
        return new self($message, $code, $cause, $previous);
    }
}
