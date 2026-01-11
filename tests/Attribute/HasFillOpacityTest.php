<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFillOpacity;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FillOpacityProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

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
 * - Error handling for invalid attributes.
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
            $instance->fillOpacity(0.5),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FillOpacityProvider::class, 'values')]
    public function testSetFillOpacityAttributeValue(
        float|int|string|null $fillopacity,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        $instance = $instance->attributes($attributes)->fillOpacity($fillopacity);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::FILL_OPACITY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingValueIsGreaterThanOne(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->fillOpacity(1.1);
    }
}
