<?php

declare(strict_types=1);

namespace SBordier44\Observer;

interface EventDispatcherInterface
{
    public function dispatch(string $eventName, ?EventInterface $event): void;

    public function attach(string $eventName, EventListenerInterface $listener): void;
}
