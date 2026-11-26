<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Contract;

/**
 * Collects callables to execute them at a later time.
 *
 * @deprecated and will be removed in 0.10 as it has not been a practical solution to defer closure execution in a different process
 */
interface DeferralAwareInterface
{
    /**
     * Stores the given callable to execute it later.
     *
     * @deprecated see interface comment
     */
    public function defer(callable $fn): void;

    /**
     * Passes all stored callables on to the given target.
     *
     * @deprecated see interface comment
     */
    public function copyDeferrals(DeferralAwareInterface $target): void;

    /**
     * Executes all stored callables and removes them.
     *
     * @deprecated see interface comment
     */
    public function resolveDeferrals(): void;
}
