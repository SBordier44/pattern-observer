<?php

declare(strict_types=1);

namespace SBordier44\Observer\Tests\Fixtures;

use SBordier44\Observer\EventInterface;

class BarEvent implements EventInterface
{
    public const EVENT_NAME = 'bar';

    public function __construct(private string $test)
    {
    }

    public function getTest(): string
    {
        return $this->test;
    }

    public function setTest(string $test): self
    {
        $this->test = $test;
        return $this;
    }

    public static function getName(): string
    {
        return self::EVENT_NAME;
    }
}
