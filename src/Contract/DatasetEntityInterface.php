<?php declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Contract;

use Heptacom\HeptaConnect\Dataset\Base\AttachmentCollection;
use Heptacom\HeptaConnect\Dataset\Base\DependencyCollection;

interface DatasetEntityInterface extends \JsonSerializable
{
    public function getDependencies(): DependencyCollection;

    public function getAttachments(): AttachmentCollection;

    public function attach(DatasetEntityInterface $attachment): void;

    /**
     * @psalm-param class-string $class
     */
    public function hasAttached(string $class): bool;

    /**
     * @psalm-param class-string $class
     */
    public function getAttachment(string $class): ?DatasetEntityInterface;

    public function getPrimaryKey(): string;

    public function setPrimaryKey(string $primaryKey): void;
}
