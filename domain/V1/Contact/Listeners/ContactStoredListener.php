<?php

namespace Domain\V1\Contact\Listeners;

use Domain\V1\Contact\Events\ContactStoredEvent;

class ContactStoredListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactStoredEvent $event): void
    {
        //Example
    }
}
