<?php

declare(strict_types=1);

namespace SBordier44\Observer\Tests;

use PHPUnit\Framework\TestCase;
use SBordier44\Observer\EventDispatcher;
use SBordier44\Observer\Tests\Fixtures\BarEvent;
use SBordier44\Observer\Tests\Fixtures\FooEvent;
use SBordier44\Observer\Tests\Fixtures\ListenerProvider;

class EventDispatcherTest extends TestCase
{
    private EventDispatcher $eventDispatcher;

    public function setUp(): void
    {
        $this->eventDispatcher = new EventDispatcher(new ListenerProvider());
    }

    public function testIfSuccessfulDispachEventWithoutStoppedPropagation(): void
    {
        $fooEvent = new FooEvent('hello foo');

        self::assertEquals('hello foo', $fooEvent->getTest());

        $this->eventDispatcher->dispatch($fooEvent);

        self::assertEquals('Hello Foo', $fooEvent->getTest());
    }

    public function testIfSuccessfulDispachEventWithStoppedPropagation(): void
    {
        $barEvent = new BarEvent('hello bar');

        self::assertEquals('hello bar', $barEvent->getTest());

        $this->eventDispatcher->dispatch($barEvent);

        self::assertEquals('Hello Bar 1', $barEvent->getTest());
    }
}
