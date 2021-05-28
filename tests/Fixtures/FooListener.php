<?php

declare(strict_types=1);

namespace SBordier44\Observer\Tests\Fixtures;

use SBordier44\Observer\EventInterface;
use SBordier44\Observer\EventListenerInterface;

class FooListener implements EventListenerInterface
{
    public function listen(?EventInterface $event): void
    {
        $event->setTest('bar');
    }
}
