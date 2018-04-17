<?php

namespace UPCEngineering\Exceptions;

use Exception;

class FamilyAlreadyExistsException extends Exception
{
    protected $message = 'Family already exists.';
}
