<?php

namespace App\Exceptions;

class AuthorizationFailException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return BusinessLogicException::AUTHORIZATION_FAILED_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Authorization has been failed!";
    }
}
