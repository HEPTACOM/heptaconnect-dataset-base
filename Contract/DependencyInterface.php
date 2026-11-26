<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Contract;

/**
 * Attachable reference to a dataset entity class, that describes a dependency of a dataset entity.
 */
interface DependencyInterface extends AttachableInterface
{
    /**
     * Returns the class of the dataset entity the dependency refers to.
     *
     * @psalm-return class-string<DatasetEntityContract>
     */
    public function getDatasetEntityClass(): string;

    /**
     * Sets the class of the dataset entity the dependency refers to.
     *
     * @psalm-param class-string<DatasetEntityContract> $datasetEntityClass
     */
    public function setDatasetEntityClass(string $datasetEntityClass): void;
}
