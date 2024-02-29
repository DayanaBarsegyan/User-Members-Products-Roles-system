<?php

namespace App\Listeners;

use App\Events\PasswordChangedEvent;
use App\Repositories\tokens\Write\TokensWriteRepositoryInterface;

class PasswordChangedListener
{
    public function __construct(
        private TokensWriteRepositoryInterface $tokensWriteRepository
    ) {}

    public function handle(PasswordChangedEvent $event): bool
    {
        return $this->tokensWriteRepository->deleteByUserId($event->id);
    }
}
