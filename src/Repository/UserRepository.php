<?php

namespace Deuchnord\Reproducer\Prophecy\Repository;

use Deuchnord\Reproducer\Prophecy\Entity\Message;
use Deuchnord\Reproducer\Prophecy\Entity\User;

class UserRepository
{
    public function getUser(int $id): User
    {
        // Emulate a database that always returns a user
        $user = new User($id);
        $user->messages = [new Message('Hello World!')];

        return $user;
    }
}
