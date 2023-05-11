<?php

declare(strict_types=1);

namespace Sicram\Automapper;

interface IAutomapper
{
    /**
     * @template T of object
     *
     * @param  class-string<T> $class
     * @return T
     */
    public function fromString(string $data, string $class);

    /**
     * @template T of object
     *
     * @param  array<mixed>    $data
     * @param  class-string<T> $class
     * @return T
     */
    public function fromArray(array $data, string $class);

    /**
     * @template T of object
     *
     * @param  class-string<T> $class
     * @return T
     */
    public function fromObject(object $data, string $class);
}
