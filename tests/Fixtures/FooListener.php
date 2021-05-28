<?php

declare(strict_types=1);

namespace SBordier44\Observer\Tests\Fixtures;

class FooListener
{
    public function listen(?FooEvent $event): void
    {
        $event->setTest('Hello Foo');
    }
}
