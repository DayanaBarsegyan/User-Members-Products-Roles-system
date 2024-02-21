<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class BusinessLogicException extends Exception
{
    const SAVING_ERROR = 601;
    const USER_NOT_FOUND = 602;
    const ALREADY_EXISTS_ERROR = 603;

    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;
}
