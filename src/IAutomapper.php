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
    public function map(mixed $data, string $class);
}
