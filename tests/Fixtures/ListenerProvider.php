<?php

declare(strict_types=1);

namespace SBordier44\Observer\Tests\Fixtures;

use JetBrains\PhpStorm\Pure;
use Psr\EventDispatcher\ListenerProviderInterface;

class ListenerProvider implements ListenerProviderInterface
{
    #[Pure]
    public function getListenersForEvent(
        object $event
    ): iterable {
        $listeners = [
            FooEvent::class => [
                [new FooListener(), 'listen'],
                fn(FooEvent $event) => $event->setTest('Hello Foo')
            ],
            BarEvent::class => [
                fn(BarEvent $event) => $event->setTest('Hello Bar 1'),
                fn(BarEvent $event) => $event->setTest('Hello Bar 2')
            ]
        ];

        return $listeners[$event::class];
    }
}
