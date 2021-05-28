<?php

declare(strict_types=1);

namespace SBordier44\Observer\Tests;

use PHPUnit\Framework\TestCase;
use SBordier44\Observer\EventDispatcher;
use SBordier44\Observer\Tests\Fixtures\BarEvent;
use SBordier44\Observer\Tests\Fixtures\FooListener;

class EventDispatcherTest extends TestCase
{
    public function testIfSuccessfulDispatchEvent(): void
    {
        // Dispatcher initialization
        $eventDispatcher = new EventDispatcher();

        // Event initialization
        $event = new BarEvent('data.xyz');

        // Listener initialization
        $eventListener = new FooListener();

        // Attach listener to dispatcher
        $eventDispatcher->attach(BarEvent::getName(), $eventListener);

        // Check if event is not changed
        self::assertEquals('data.xyz', $event->getTest());

        // Dispach - Execute event
        $eventDispatcher->dispatch(BarEvent::getName(), $event);

        // Check if event have new state after dispach
        self::assertEquals('bar', $event->getTest());
    }
}
