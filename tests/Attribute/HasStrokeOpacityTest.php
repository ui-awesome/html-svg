<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeOpacity;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeOpacityProvider;

/**
 * Test suite for {@see HasStrokeOpacity} trait functionality and behavior.
 *
 * Validates management of SVG `stroke-opacity` attribute according to SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of `stroke-opacity` attribute in tag rendering, supporting
 * float, int, string, and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with `stroke-opacity` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of trait's API when setting or overriding `stroke-opacity` attribute.
 * - Proper assignment and overriding of `stroke-opacity` value.
 *
 * {@see StrokeOpacityProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeOpacityTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeOpacityProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithStrokeOpacityAttribute(
        string|null $strokeOpacity,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        $instance = $instance->attributes($attributes)->strokeOpacity($strokeOpacity);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenStrokeOpacityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeOpacityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeOpacity('0'),
            'Should return a new instance when setting attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeOpacityProvider::class, 'values')]
    public function testSetStrokeOpacityAttributeValue(
        string|null $strokeOpacity,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        $instance = $instance->attributes($attributes)->strokeOpacity($strokeOpacity);

        self::assertSame(
            $expected,
            $instance->getAttributes()['stroke-opacity'] ?? '',
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidNegativeStrokeOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->strokeOpacity(-5);
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidOverOneStrokeOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->strokeOpacity(1.5);
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidStringStrokeOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->strokeOpacity('invalid-value');
    }
}
