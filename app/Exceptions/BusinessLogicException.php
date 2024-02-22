<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class BusinessLogicException extends Exception
{
    const SAVING_ERROR = 601;
    const AUTHORIZATION_FAILED_ERROR = 602;
    const ALREADY_EXISTS_ERROR = 603;
    const DELETING_ERROR = 604;

    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;
}
