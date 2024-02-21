<?php

namespace App\Exceptions;

class AlreadyExistsException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::ALREADY_EXISTS_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Entity already exists";
    }
}
