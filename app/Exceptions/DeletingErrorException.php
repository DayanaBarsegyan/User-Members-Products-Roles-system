<?php

namespace App\Exceptions;

class DeletingErrorException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::DELETING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Something went wrong during deleting process";
    }
}
