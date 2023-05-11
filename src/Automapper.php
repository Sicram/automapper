<?php

declare(strict_types=1);

namespace Sicram\Automapper;

use JsonMapper\JsonMapperInterface;

use function assert;
use function json_encode;

final class Automapper implements IAutomapper
{
    private JsonMapperInterface $mapper;

    public function __construct()
    {
        $this->mapper = (new \JsonMapper\JsonMapperFactory())->bestFit();
    }

    public function fromString(string $data, string $class)
    {
        return $this->map($data, $class);
    }

    public function fromArray(array $data, string $class)
    {
        $json = json_encode($data);
        assert($json !== false);

        return $this->map($json, $class);
    }

    public function fromObject(object $data, string $class)
    {
        $json = json_encode($data);
        assert($json !== false);

        return $this->map($json, $class);
    }

    /**
     * @template T of object
     *
     * @param  class-string<T> $class
     * @return T
     */
    private function map(string $json, string $class)
    {
        $result = $this->mapper->mapToClassFromString($json, $class);
        assert($result instanceof $class);

        return $result;
    }
}
