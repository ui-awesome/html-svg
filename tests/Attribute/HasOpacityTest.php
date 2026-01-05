<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasOpacity;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\OpacityProvider;

/**
 * Test suite for {@see HasOpacity} trait functionality and behavior.
 *
 * Validates the management of the SVG `opacity` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `opacity` attribute in tag rendering, supporting float,
 * int, string and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `opacity` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `opacity` attribute.
 * - Proper assignment and overriding of `opacity` value.
 *
 * {@see OpacityProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasOpacityTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(OpacityProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithOpacityAttribute(
        float|int|string|null $opacity,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        $instance = $instance->attributes($attributes)->opacity($opacity);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenOpacityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingOpacityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        self::assertNotSame(
            $instance,
            $instance->opacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(OpacityProvider::class, 'values')]
    public function testSetOpacityAttributeValue(
        float|int|string|null $opacity,
        array $attributes,
        float|int|string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        $instance = $instance->attributes($attributes)->opacity($opacity);

        self::assertSame(
            $expected,
            $instance->getAttributes()['opacity'] ?? '',
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidNegativeOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->opacity(-5);
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidOverOneOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->opacity(1.5);
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidStringOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->opacity('invalid-value');
    }
}
