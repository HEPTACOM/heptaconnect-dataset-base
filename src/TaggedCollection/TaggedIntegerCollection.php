<?php
declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\TaggedCollection;

use Heptacom\HeptaConnect\Dataset\Base\ScalarCollection\IntegerCollection;

/**
 * @extends \Heptacom\HeptaConnect\Dataset\Base\TaggedCollection\AbstractTaggedCollection<int>
 */
class TaggedIntegerCollection extends AbstractTaggedCollection
{
    protected function getCollectionType(): string
    {
        return IntegerCollection::class;
    }
}
