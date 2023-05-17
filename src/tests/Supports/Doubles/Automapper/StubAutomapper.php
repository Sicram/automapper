<?php

declare(strict_types=1);

namespace Sicram\Automapper\Tests\Supports\Doubles\Automapper;

use Sicram\Automapper\Automapper;
use Sicram\Automapper\IAutomapper;

final class StubAutomapper implements IAutomapper
{
    private ?object $expectedResult = null;

    public function map(mixed $data, string $class): mixed
    {
        if ($this->expectedResult !== null && $this->expectedResult instanceof $class) {
            return $this->expectedResult;
        }

        $mapper = new Automapper();

        return $mapper->map($data, $class);
    }

    public function setExpectedResult(object $expected): void
    {
        $this->expectedResult = $expected;
    }
}
