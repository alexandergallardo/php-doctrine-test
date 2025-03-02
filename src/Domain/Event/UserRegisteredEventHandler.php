<?php

namespace App\Domain\Event;

class UserRegisteredEventHandler
{
    public function handle(UserRegisteredEvent $event)
    {
        // Simulación de envío de email de bienvenida
        return "Welcome email sent to: " . $event->getUser()->getEmail();
    }
}
