<?php

declare(strict_types=1);

namespace Devorto\KeyValueStorage;

use InvalidArgumentException;
use Iterator;

/**
 * Class KeyValueStorage
 *
 * @package Devorto\DependencyInjection
 */
class KeyValueStorage implements Iterator
{
    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return KeyValueStorage
     */
    public function add(string $key, mixed $value): KeyValueStorage
    {
        if (empty(trim($key))) {
            throw new InvalidArgumentException('Key cannot be an empty string.');
        }

        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key): mixed
    {
        if (empty(trim($key))) {
            throw new InvalidArgumentException('Key cannot be an empty string.');
        }

        return $this->data[$key];
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        if (empty(trim($key))) {
            throw new InvalidArgumentException('Key cannot be an empty string.');
        }

        return array_key_exists($key, $this->data);
    }

    /**
     * @param string $key
     *
     * @return KeyValueStorage
     */
    public function delete(string $key): KeyValueStorage
    {
        if (empty(trim($key))) {
            throw new InvalidArgumentException('Key cannot be an empty string.');
        }

        unset($this->data[$key]);

        return $this;
    }

    /**
     * Return the current element
     *
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current(): mixed
    {
        return current($this->data);
    }

    /**
     * Move forward to next element
     *
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next(): void
    {
        next($this->data);
    }

    /**
     * Return the key of the current element
     *
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key(): mixed
    {
        return key($this->data);
    }

    /**
     * Checks if current position is valid
     *
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid(): bool
    {
        return key($this->data) !== null;
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind(): void
    {
        reset($this->data);
    }
}
