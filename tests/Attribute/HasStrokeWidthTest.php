<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeWidth;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeWidthProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasStrokeWidth} trait functionality and behavior.
 *
 * Validates the management of the SVG `stroke-width` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `stroke-width` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `stroke-width` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `stroke-width` attribute.
 * - Proper assignment and overriding of `stroke-width` value.
 *
 * {@see StrokeWidthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeWidthTest extends TestCase
{
    public function testReturnEmptyWhenStrokeWidthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeWidth;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeWidthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeWidth;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeWidthProvider::class, 'values')]
    public function testSetStrokeWidthAttributeValue(
        int|string|null $strokeWidth,
        array $attributes,
        int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeWidth;
        };

        $instance = $instance->attributes($attributes)->strokeWidth($strokeWidth);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::STROKE_WIDTH, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
