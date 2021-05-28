<?php

declare(strict_types=1);

namespace SBordier44\Observer\Tests\Fixtures;

class FooEvent
{
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
}
