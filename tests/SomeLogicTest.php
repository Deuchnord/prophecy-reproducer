<?php

namespace Deuchnord\Reproducer\Prophecy\Test;

use Deuchnord\Reproducer\Prophecy\Repository\UserRepository;
use Deuchnord\Reproducer\Prophecy\SomeLogic;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class SomeLogicTest extends TestCase
{
    use ProphecyTrait;

    public function testMakeRootWithValidUserId()
    {
        $logic = new SomeLogic(
            ($userRepository = $this->prophesize(UserRepository::class))->reveal(),
        );

        $userRepository->getUser()->shouldNotBeCalled();

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid user id, must be greater than 0');

        // We do a mistake on purpose to show the bug in Prophecy:
        $logic->makeRoot(1);

        // Expected: "No calls expected that match (...)\UserRepository\P1::getUser(any()) but 1 was made"
        // Got: TypeError: (...)\UserRepository\P1::getUser(): Return value must be of type (...)\User, null returned
    }
}
