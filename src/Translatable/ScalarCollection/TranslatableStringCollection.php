<?php
declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Translatable\ScalarCollection;

use Heptacom\HeptaConnect\Dataset\Base\Contract\CollectionInterface;
use Heptacom\HeptaConnect\Dataset\Base\ScalarCollection\StringCollection;

/**
 * @extends \Heptacom\HeptaConnect\Dataset\Base\Translatable\ScalarCollection\AbstractTranslatableScalarCollection<\Heptacom\HeptaConnect\Dataset\Base\ScalarCollection\StringCollection>
 */
class TranslatableStringCollection extends AbstractTranslatableScalarCollection
{
    protected function getInitialValue(): CollectionInterface
    {
        return new StringCollection();
    }
}
