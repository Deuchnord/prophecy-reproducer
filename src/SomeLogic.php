<?php

namespace Deuchnord\Reproducer\Prophecy;

use Deuchnord\Reproducer\Prophecy\Repository\UserRepository;

class SomeLogic
{
    public function __construct(private UserRepository $userRepository = new UserRepository())
    {
    }

    public function makeRoot(int $userId): void
    {
        if (0 >= $userId) {
            throw new \LogicException('Invalid user id, must be greater than 0');
        }

        $this->userRepository->getUser($userId)->makeRoot();
    }
}
