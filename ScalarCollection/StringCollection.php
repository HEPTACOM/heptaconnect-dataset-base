<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\ScalarCollection;

use Heptacom\HeptaConnect\Dataset\Base\Support\AbstractCollection;

/**
 * @extends AbstractCollection<string>
 */
final class StringCollection extends AbstractCollection
{
    public function join(string $glue = ''): string
    {
        return \implode($glue, $this->items);
    }

    protected function isValidItem($item): bool
    {
        return \is_string($item);
    }
}
