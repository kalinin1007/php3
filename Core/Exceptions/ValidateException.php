<?php

namespace Core\Exceptions;

class ValidateException extends \Exception
{
    public $errors;

    public function __construct($errors)
    {
        parent::__construct();
        $this->errors = $errors;
    }
}