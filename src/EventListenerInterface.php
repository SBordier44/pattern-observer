<?php

declare(strict_types=1);

namespace SBordier44\Observer;

interface EventListenerInterface
{
    public function listen(?EventInterface $event): void;
}
