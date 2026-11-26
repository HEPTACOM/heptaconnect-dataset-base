<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Contract;

/**
 * Holds the primary key of a dataset entity of the foreign entity type.
 * A dataset entity of that type updates the foreign key of such an attachment, when its primary key changes.
 */
interface ForeignKeyAwareInterface
{
    /**
     * Returns the class of the dataset entity, whose primary key is referenced.
     *
     * @psalm-return class-string<DatasetEntityContract>
     */
    public function getForeignEntityType(): string;

    /**
     * Returns the primary key of the referenced dataset entity.
     */
    public function getForeignKey(): ?string;

    /**
     * Sets the primary key of the referenced dataset entity.
     */
    public function setForeignKey(?string $foreignKey): void;
}
