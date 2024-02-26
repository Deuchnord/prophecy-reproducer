# Prophecy - reproducer

This repo contains minimal code to reproduce the bug described in issue https://github.com/phpspec/prophecy/issues/617.

## Install

Clone this repository and install the dependencies with `composer install`.

## Run the reproducer

The bug is in the tests: a mistake is done on purpose in the SomeLogicTest class, line 26:

```diff
-        $logic->makeRoot(-1);
+        $logic->makeRoot(1);
```
Because of the missing minus symbol, the following error is expected when running the tests:

```
No calls expected that match \Deuchnord\Reproducer\Prophecy\Repository\UserRepository::getUser(any()) but 1 was made
```

But instead we get the following misleading error:

```
Failed asserting that exception of type "TypeError" matches expected exception "LogicException". Message was: "Double\Deuchnord\Reproducer\Prophecy\Repository\UserRepository\P1::getUser(): Return value must be of type Deuchnord\Reproducer\Prophecy\Entity\User, null returned"
```
