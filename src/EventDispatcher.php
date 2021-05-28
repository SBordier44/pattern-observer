<?php

declare(strict_types=1);

namespace SBordier44\Observer;

class EventDispatcher implements EventDispatcherInterface
{
    private array $listeners = [];

    public function dispatch(string $eventName, ?EventInterface $event): void
    {
        foreach ($this->listeners[$eventName] as $listener) {
            $listener->listen($event);
        }
    }

    public function attach(string $eventName, EventListenerInterface $listener): void
    {
        $this->listeners[$eventName][] = $listener;
    }
}
