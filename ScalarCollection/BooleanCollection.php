<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\ScalarCollection;

use Heptacom\HeptaConnect\Dataset\Base\Support\AbstractCollection;

/**
 * @extends AbstractCollection<bool>
 */
class BooleanCollection extends AbstractCollection
{
    protected function isValidItem($item): bool
    {
        /* @phpstan-ignore-next-line treatPhpDocTypesAsCertain checks soft check but this is the hard check */
        return \is_bool($item);
    }
}
