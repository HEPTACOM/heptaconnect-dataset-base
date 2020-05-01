<?php declare(strict_types=1);

namespace Heptacom\HeptaConnect\Dataset\Base\Test;

use Heptacom\HeptaConnect\Dataset\Base\DatasetEntity;
use Heptacom\HeptaConnect\Dataset\Base\Test\Fixture\SerializationDatasetEntity;
use PHPStan\Testing\TestCase;

/**
 * @covers \Heptacom\HeptaConnect\Dataset\Base\DatasetEntity
 */
class StructTest extends TestCase
{
    /**
     * @dataProvider provideStructs
     */
    public function testSerializationAccessors(DatasetEntity $struct): void
    {
        $deserializedData = $this->codeIt($struct);

        $this->assertArrayNotHasKey('privateString', $deserializedData);
        $this->assertArrayHasKey('protectedString', $deserializedData);
        $this->assertArrayHasKey('publicString', $deserializedData);
    }

    /**
     * @depends testSerializationAccessors
     * @dataProvider provideStructs
     */
    public function testSerializationTypes(DatasetEntity $struct): void
    {
        $deserializedData = $this->codeIt($struct);

        $this->assertIsString($deserializedData['publicString']);
        $this->assertIsString($deserializedData['publicDateTime']);
        $this->assertIsInt($deserializedData['publicInt']);
        $this->assertIsFloat($deserializedData['publicFloat']);
    }

    /**
     * @return iterable<string, array<int, DatasetEntity>>
     */
    public function provideStructs(): iterable
    {
        yield SerializationDatasetEntity::class => [new SerializationDatasetEntity()];
    }

    /**
     * @throws \JsonException
     */
    protected function codeIt(DatasetEntity $struct): array
    {
        $encoded = \json_encode($struct, \JSON_THROW_ON_ERROR);
        /** @var array<string, mixed> $decoded */
        $decoded = \json_decode($encoded, true, 512, \JSON_THROW_ON_ERROR);

        return $decoded;
    }
}
