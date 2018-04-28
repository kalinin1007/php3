<?php

namespace Core\Exceptions;

Class ValidateException extends \Exception
{
    public $errors;

    public function __construct($errors)
    {
        parent::__construct();
        $this->errors = $errors;
    }
}