<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Translatable\Contract;

/**
 * Holds a value per locale key and an optional fallback value.
 *
 * @template T
 */
interface TranslatableInterface
{
    /**
     * Returns the value of the given locale key.
     * When there is none, it returns the fallback value if requested. Otherwise, the implementation decides what to
     * return, e.g. null or a new empty value.
     *
     * @deprecated 1.0.0 Invert returnFallback to true
     *
     * @return T|null
     */
    public function getTranslation(string $localeKey, bool $returnFallback = false);

    /**
     * Sets the value of the given locale key.
     *
     * @psalm-param T $value
     *
     * @param T $value
     *
     * @return TranslatableInterface<T>
     */
    public function setTranslation(string $localeKey, $value): TranslatableInterface;

    /**
     * Removes the value of the given locale key.
     *
     * @return TranslatableInterface<T>
     */
    public function removeTranslation(string $localeKey): TranslatableInterface;

    /**
     * Returns the fallback value, which getTranslation returns when requested.
     *
     * @return T|null
     */
    public function getFallback();

    /**
     * Sets the fallback value.
     *
     * @psalm-param T $value
     *
     * @param T $value
     *
     * @return TranslatableInterface<T>
     */
    public function setFallback($value): TranslatableInterface;

    /**
     * Removes the fallback value.
     *
     * @return TranslatableInterface<T>
     */
    public function removeFallback(): TranslatableInterface;

    /**
     * Returns the locale keys that have a value.
     *
     * @return array<string>
     */
    public function getLocaleKeys(): array;
}
