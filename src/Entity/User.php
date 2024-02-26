<?php

namespace Deuchnord\Reproducer\Prophecy\Entity;

class User
{
    public array $messages = [];
    private bool $isRoot = false;

    public function __construct(public readonly int $id)
    {
    }

    public function makeRoot(): void
    {
        $this->isRoot = true;
    }
}
