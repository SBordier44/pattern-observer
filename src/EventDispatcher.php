<?php

declare(strict_types=1);

namespace SBordier44\Observer;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;

class EventDispatcher implements EventDispatcherInterface
{
    public function __construct(private ListenerProviderInterface $listenerProvider)
    {
    }

    public function dispatch(object $event): void
    {
        foreach ($this->listenerProvider->getListenersForEvent($event) as $listener) {
            $listener($event);

            if (in_array(
                    StoppableEventInterface::class,
                    class_implements($event),
                    true
                ) && $event->isPropagationStopped()) {
                break;
            }
        }
    }
}
