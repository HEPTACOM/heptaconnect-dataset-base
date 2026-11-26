<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Contract;

/**
 * Ordered list of items, that can be iterated, counted, accessed like an array and serialized as JSON.
 *
 * @template T
 * @extends \ArrayAccess<int, T>
 * @extends \IteratorAggregate<int, T>
 */
interface CollectionInterface extends \IteratorAggregate, \Countable, \ArrayAccess, \JsonSerializable
{
    /**
     * Appends the given items to the end of the collection. Collections keyed by an item property, like tagged
     * collections, replace the item with the same key instead. Items the collection does not accept are skipped.
     *
     * @psalm-param iterable<int, T> $items
     */
    public function push(iterable $items): void;

    /**
     * Removes and returns the last item, or returns null when the collection is empty.
     *
     * @return T|null
     */
    public function pop();

    /**
     * Removes and returns the first item, or returns null when the collection is empty.
     *
     * @return T|null
     */
    public function shift();

    /**
     * Removes all items from the collection.
     */
    public function clear(): void;

    /**
     * Returns true, when no entry is in the collection, otherwise false.
     */
    public function isEmpty(): bool;

    /**
     * Returns the first item without removing it, or null when the collection is empty.
     *
     * @return T|null
     */
    public function first();

    /**
     * Returns the last item without removing it, or null when the collection is empty.
     *
     * @return T|null
     */
    public function last();

    /**
     * Yields the items, for which the given callback returns true.
     *
     * @param callable(mixed):bool $filterFn
     *
     * @psalm-return \Generator<int, T>
     */
    public function filter(callable $filterFn): \Generator;

    /**
     * Yields the return value of the given callback for each item. The callback receives the item and its key.
     *
     * @template TMapped
     *
     * @psalm-param callable(T, array-key): TMapped $mapFn
     *
     * @return iterable<int, TMapped>
     */
    public function map(callable $mapFn): iterable;

    /**
     * Yields the value of the named method, property or array key of each item.
     * The optional key accessor selects the keys the same way.
     */
    public function column(string $valueAccessor, ?string $keyAccessor = null): iterable;
}
