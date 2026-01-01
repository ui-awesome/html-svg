<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasFillOpacity;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FillOpacityProvider;

/**
 * Test suite for {@see HasFillOpacity} trait functionality and behavior.
 *
 * Validates management of SVG `fill-opacity` attribute according to SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of `fill-opacity` attribute in tag rendering, supporting
 * float, int, string and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with `fill-opacity` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of trait's API when setting or overriding `fill-opacity` attribute.
 * - Proper assignment and overriding of `fill-opacity` value.
 *
 * {@see FillOpacityProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFillOpacityTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FillOpacityProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithFillOpacityAttribute(
        float|int|string|null $fillOpacity,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        $instance = $instance->attributes($attributes)->fillOpacity($fillOpacity);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenFillOpacityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFillOpacityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        self::assertNotSame(
            $instance,
            $instance->fillOpacity('0'),
            'Should return a new instance when setting attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FillOpacityProvider::class, 'values')]
    public function testSetFillOpacityAttributeValue(
        float|int|string|null $fillOpacity,
        array $attributes,
        float|int|string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        $instance = $instance->attributes($attributes)->fillOpacity($fillOpacity);

        self::assertSame(
            $expected,
            $instance->getAttributes()['fill-opacity'] ?? '',
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidNegativeFillOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->fillOpacity(-5);
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidOverOneFillOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->fillOpacity(1.5);
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidStringFillOpacityValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->fillOpacity('invalid-value');
    }
}
