<?php

namespace App\Exceptions;


class SavingErrorException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::SAVING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Something went wrong during saving process";
    }
}
