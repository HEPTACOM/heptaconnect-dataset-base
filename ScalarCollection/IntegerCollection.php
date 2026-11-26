<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\ScalarCollection;

use Heptacom\HeptaConnect\Dataset\Base\Support\AbstractCollection;

/**
 * @extends AbstractCollection<int>
 */
final class IntegerCollection extends AbstractCollection
{
    public function min(): ?int
    {
        if ($this->isEmpty()) {
            return null;
        }

        return (int) \min($this->items);
    }

    public function max(): ?int
    {
        if ($this->isEmpty()) {
            return null;
        }

        return (int) \max($this->items);
    }

    public function sum(): int
    {
        if ($this->isEmpty()) {
            return 0;
        }

        // array_sum() returns a float when the sum leaves the integer range
        /** @var float|int $sum */
        $sum = \array_sum($this->items);

        return (int) $sum;
    }

    protected function isValidItem($item): bool
    {
        return \is_int($item);
    }
}
