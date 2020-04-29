<?php declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Test\Fixture;

use Heptacom\HeptaConnect\Dataset\Base\Struct;

class SerializationStruct extends Struct
{
    public string $publicString = 'public';

    public \DateTimeInterface $publicDateTime;

    public int $publicInt = 42;

    public float $publicFloat = 13.37;

    protected string $protectedString = 'protected';

    private string $privateString = 'private';

    public function __construct()
    {
        $this->publicDateTime = \date_create();
    }
}
