<?php declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Support;

trait DependencyTrait
{
    protected string $datasetEntityClass = '';

    public function getDatasetEntityClass(): string
    {
        return $this->datasetEntityClass;
    }

    public function setDatasetEntityClass(string $datasetEntityClass): void
    {
        $this->datasetEntityClass = $datasetEntityClass;
    }
}
