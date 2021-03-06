<?php
declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\TaggedCollection;

use Heptacom\HeptaConnect\Dataset\Base\ScalarCollection\StringCollection;

/**
 * @extends \Heptacom\HeptaConnect\Dataset\Base\TaggedCollection\AbstractTaggedCollection<string>
 */
class TaggedStringCollection extends AbstractTaggedCollection
{
    protected function getCollectionType(): string
    {
        return StringCollection::class;
    }
}
