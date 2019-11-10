<?php

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
    protected $data = [];

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return KeyValueStorage
     */
    public function add(string $key, $value): KeyValueStorage
    {
        if (empty($key)) {
            throw new InvalidArgumentException('Key cannot be empty.');
        }

        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->data[$key];
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @param string $key
     *
     * @return KeyValueStorage
     */
    public function delete(string $key): KeyValueStorage
    {
        unset($this->data[$key]);

        return $this;
    }

    /**
     * Return the current element
     *
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * Move forward to next element
     *
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * Return the key of the current element
     *
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Checks if current position is valid
     *
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return key($this->data) !== null;
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        reset($this->data);
    }
}
