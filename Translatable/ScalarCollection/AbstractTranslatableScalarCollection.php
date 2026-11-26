<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Translatable\ScalarCollection;

use Heptacom\HeptaConnect\Dataset\Base\Contract\CollectionInterface;
use Heptacom\HeptaConnect\Dataset\Base\Translatable\AbstractTranslatable;

/**
 * @template T of CollectionInterface
 * @extends AbstractTranslatable<T>
 *
 * @property T $fallback
 */
abstract class AbstractTranslatableScalarCollection extends AbstractTranslatable
{
    public function __construct()
    {
        $this->fallback = $this->getInitialValue();
    }

    /**
     * Returns the collection of the given locale key.
     * When there is none, it returns the fallback collection if requested. Otherwise, it stores a new empty collection
     * under the locale key and returns it, so getLocaleKeys lists the locale key from then on.
     *
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
     * Returns the fallback collection. When there is none, it creates a new empty one.
     *
     * @psalm-return T
     */
    public function getFallback()
    {
        return $this->fallback ??= $this->getInitialValue();
    }

    protected function isValidValue($value): bool
    {
        return $value instanceof $this->fallback;
    }

    /**
     * @psalm-return T
     */
    abstract protected function getInitialValue(): CollectionInterface;
}
