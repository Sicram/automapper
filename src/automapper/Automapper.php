<?php

declare(strict_types=1);

namespace Sicram\Automapper;

use JsonMapper\JsonMapperInterface;

use function assert;
use function gettype;
use function json_encode;

final class Automapper implements IAutomapper
{
    private JsonMapperInterface $mapper;

    public function __construct()
    {
        $this->mapper = (new \JsonMapper\JsonMapperFactory())->bestFit();
    }

    public function map(mixed $data, string $class)
    {
        return match (gettype($data)) {
            'string' => $this->fromString($data, $class),
            'array' => $this->fromArray($data, $class),
            'object' => $this->fromObject($data, $class),
            default => new $class(),
        };
    }

    /**
     * @template T of object
     *
     * @param  class-string<T> $class
     * @return T
     */
    private function fromString(string $data, string $class)
    {
        return $this->_map($data, $class);
    }

    /**
     * @template T of object
     *
     * @param  array<mixed>    $data
     * @param  class-string<T> $class
     * @return T
     */
    private function fromArray(array $data, string $class)
    {
        $json = json_encode($data);
        assert($json !== false);

        return $this->_map($json, $class);
    }

    /**
     * @template T of object
     *
     * @param  class-string<T> $class
     * @return T
     */
    private function fromObject(object $data, string $class)
    {
        $json = json_encode($data);
        assert($json !== false);

        return $this->_map($json, $class);
    }

    /**
     * @template T of object
     *
     * @param  class-string<T> $class
     * @return T
     */
    private function _map(string $json, string $class)
    {
        $result = $this->mapper->mapToClassFromString($json, $class);
        assert($result instanceof $class);

        return $result;
    }
}
