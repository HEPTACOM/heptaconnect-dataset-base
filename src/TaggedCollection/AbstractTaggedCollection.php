<?php
declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\TaggedCollection;

use Heptacom\HeptaConnect\Dataset\Base\Contract\CollectionInterface;
use Heptacom\HeptaConnect\Dataset\Base\Support\AbstractCollection;

/**
 * @template T
 * @extends \Heptacom\HeptaConnect\Dataset\Base\Support\AbstractCollection<\Heptacom\HeptaConnect\Dataset\Base\TaggedCollection\TagItem<T>>
 */
abstract class AbstractTaggedCollection extends AbstractCollection
{
    /**
     * @psalm-param array-key $offset
     * @psalm-return \Heptacom\HeptaConnect\Dataset\Base\TaggedCollection\TagItem<T>
     */
    public function offsetGet($offset)
    {
        $offset = (string) $offset;
        $tag = parent::offsetGet($offset);

        if (!\is_null($tag)) {
            return $tag;
        }

        $tag = new TagItem($this->createEmptyCollection(), $offset);
        $this->offsetSet($offset, $tag);

        return $tag;
    }

    public function offsetSet($offset, $value)
    {
        parent::offsetSet($value->getTag(), $value);
    }

    public function push(iterable $items): void
    {
        /** @psalm-var TagItem<T> $item */
        foreach (\iterator_to_array($this->filterValid($items)) as $item) {
            $this->offsetSet($item->getTag(), $item);
        }
    }

    protected function isValidItem($item): bool
    {
        /* @phpstan-ignore-next-line treatPhpDocTypesAsCertain checks soft check but this is the hard check */
        return \is_object($item) && $item instanceof TagItem && \is_a($item->getCollection(), $this->getCollectionType(), false);
    }

    /**
     * @psalm-return class-string<\Heptacom\HeptaConnect\Dataset\Base\Contract\CollectionInterface<T>>
     */
    abstract protected function getCollectionType(): string;

    /**
     * @psalm-return \Heptacom\HeptaConnect\Dataset\Base\Contract\CollectionInterface<T>
     */
    private function createEmptyCollection(): CollectionInterface
    {
        $collectionType = $this->getCollectionType();

        return new $collectionType();
    }
}
