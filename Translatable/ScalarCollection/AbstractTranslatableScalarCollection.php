<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Translatable\ScalarCollection;

use Heptacom\HeptaConnect\Dataset\Base\Contract\CollectionInterface;
use Heptacom\HeptaConnect\Dataset\Base\Translatable\AbstractTranslatable;

/**
 * @template T of CollectionInterface
 *
 * @extends AbstractTranslatable<T>
 */
abstract class AbstractTranslatableScalarCollection extends AbstractTranslatable
{
    public function __construct()
    {
        $this->fallback = $this->getInitialValue();
    }

    /**
     * @psalm-return T|null
     */
    public function getTranslation(string $localeKey, bool $returnFallback = false)
    {
        $result = parent::getTranslation($localeKey, false);

        if ($result !== null && $this->isValidValue($result)) {
            return $result;
        }

        if ($returnFallback) {
            return $this->getFallback();
        }

        $result = $this->getInitialValue();
        $this->setTranslation($localeKey, $result);

        return $result;
    }

    /**
     * @return T
     */
    public function getFallback(): CollectionInterface
    {
        $result = $this->fallback ?? $this->getInitialValue();
        $this->fallback = $result;

        return $result;
    }

    protected function isValidValue(mixed $value): bool
    {
        $collection = $this->getInitialValue();

        return \is_a($value, $collection::class, false);
    }

    /**
     * @return T
     */
    abstract protected function getInitialValue(): CollectionInterface;
}
