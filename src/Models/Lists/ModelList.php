<?php

declare(strict_types=1);

namespace PowerSrc\AmazonAdvertisingApi\Models\Lists;

use ArrayAccess;
use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use JsonSerializable;
use PowerSrc\AmazonAdvertisingApi\Contracts\Arrayable;
use PowerSrc\AmazonAdvertisingApi\Contracts\Jsonable;
use PowerSrc\AmazonAdvertisingApi\Exceptions\ClassNotFoundException;
use PowerSrc\AmazonAdvertisingApi\Models\Model;
use PowerSrc\AmazonAdvertisingApi\Support\CastType;

abstract class ModelList implements ArrayAccess, Arrayable, Countable, Jsonable, JsonSerializable, IteratorAggregate
{
    /**
     * @var Model[]
     */
    protected $itemList = [];

    /**
     * Modelclass of the list items.
     *
     * Must extend the Model class.
     *
     * @var string
     */
    private $class;

    /**
     * @param object[] $rawRecords
     *
     * @throws ClassNotFoundException
     */
    public function __construct(array $rawRecords = [])
    {
        $this->class = $this->getListItemClass();

        if ( ! \class_exists($this->class)) {
            throw new ClassNotFoundException('Invalid model class `' . $this->class ?? 'null' . '`.', $this->class);
        }

        $this->itemList = \array_map(function ($rawRecord) {
            return $rawRecord instanceof $this->class ? $rawRecord : new $this->class($rawRecord);
        }, $rawRecords);
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | Magic methods:
    |-------------------------------------------------------------------------------------------------------------------
    */

    public function __toString(): string
    {
        return $this->toJson();
    }

    public function addItem(Model $item): ModelList
    {
        if ( ! $item instanceof $this->class) {
            throw new InvalidArgumentException('Attempt to set invalid type. Must be `' . $this->class . '`.');
        }
        $this->itemList[] = $item;

        return $this;
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | ArrayAccess implementation:
    |-------------------------------------------------------------------------------------------------------------------
    */

    /**
     * @param mixed $offset
     */
    public function offsetExists($offset): bool
    {
        return isset($this->itemList[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetGet($offset): ?Model
    {
        return $this->offsetExists($offset) ? $this->itemList[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        if ( ! $value instanceof $this->class) {
            throw new InvalidArgumentException('Attempt to set invalid type. Must be `' . $this->class . '`.');
        }
        $this->itemList[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->itemList[$offset]);
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | Arrayable implementation:
    |-------------------------------------------------------------------------------------------------------------------
    */

    public function toArray(): array
    {
        return $this->itemList;
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | Countable implementation:
    |-------------------------------------------------------------------------------------------------------------------
    */

    public function count(): int
    {
        return \count($this->itemList);
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | Jsonable implementation:
    |-------------------------------------------------------------------------------------------------------------------
    */

    /**
     * @throws InvalidArgumentException
     */
    public function toJson(int $options = 0): string
    {
        return CastType::toJson($this->jsonSerialize(), $options);
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | JsonSerializable implementation:
    |-------------------------------------------------------------------------------------------------------------------
    */

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | IteratorAggregate implementation:
    |-------------------------------------------------------------------------------------------------------------------
    */

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->itemList);
    }

    abstract protected function getListItemClass(): string;
}
