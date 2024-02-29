<?php

namespace App\Listeners;

use App\Events\PasswordChangedEvent;
use App\Repositories\tokens\Write\TokensWriteRepositoryInterface;

class PasswordChangedListener
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private TokensWriteRepositoryInterface $tokensWriteRepository
    ) {}

    /**
     * Handle the event.
     */
    public function handle(PasswordChangedEvent $event): bool
    {
        return $this->tokensWriteRepository->deleteByUserId($event->id);
    }
}
