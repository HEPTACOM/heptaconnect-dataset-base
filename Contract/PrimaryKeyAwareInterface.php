<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Contract;

/**
 * Holds an optional primary key.
 */
interface PrimaryKeyAwareInterface
{
    /**
     * Returns the primary key, or null when none is set.
     */
    public function getPrimaryKey(): ?string;

    /**
     * Sets the primary key, or removes it with null.
     */
    public function setPrimaryKey(?string $primaryKey): void;
}
