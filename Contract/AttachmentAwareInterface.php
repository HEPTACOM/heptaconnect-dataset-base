<?php

declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Contract;

use Heptacom\HeptaConnect\Dataset\Base\AttachmentCollection;

/**
 * Holds attachments, of which at most one per class is attached at a time.
 */
interface AttachmentAwareInterface
{
    /**
     * Returns all attachments.
     */
    public function getAttachments(): AttachmentCollection;

    /**
     * Attaches the given object and replaces a previous attachment of the same class.
     */
    public function attach(AttachableInterface $attachment): void;

    /**
     * Returns true, when an attachment is an instance of the given class or interface.
     *
     * @param class-string $class
     */
    public function hasAttached(string $class): bool;

    /**
     * Returns true, when the given instance is attached.
     */
    public function isAttached(AttachableInterface $attachable): bool;

    /**
     * Returns the attachment of exactly the given class, otherwise the first attachment that is an instance of the given class or interface.
     * Returns null, when there is none.
     *
     * @param class-string $class
     */
    public function getAttachment(string $class): ?AttachableInterface;

    /**
     * Removes all attachments that are an instance of the given class or interface.
     *
     * @param class-string $class
     */
    public function detachByType(string $class): void;

    /**
     * Removes the given instance from the attachments.
     */
    public function detach(AttachableInterface $attachable): void;
}
