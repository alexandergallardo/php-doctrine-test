<?php

namespace App\Domain\Event;

class UserRegisteredEventHandler
{
    public function handle(UserRegisteredEvent $event): void
    {
        // Simulación de envío de email de bienvenida
        echo "Email de bienvenida enviado a: " . $event->getUser()->getEmail() . PHP_EOL;
    }
}
