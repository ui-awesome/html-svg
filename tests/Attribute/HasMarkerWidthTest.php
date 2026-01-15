<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasMarkerWidth;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\MarkerWidthProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasMarkerWidth} trait functionality and behavior.
 *
 * Validates the management of the SVG `markerWidth` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `markerWidth` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic width assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `markerWidth` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `markerWidth` attribute.
 * - Proper assignment and overriding of `markerWidth` value.
 *
 * {@see MarkerWidthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMarkerWidthTest extends TestCase
{
    public function testReturnEmptyWhenMarkerWidthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMarkerWidth;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMarkerWidthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMarkerWidth;
        };

        self::assertNotSame(
            $instance,
            $instance->markerWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MarkerWidthProvider::class, 'values')]
    public function testSetMarkerWidthAttributeValue(
        float|int|string|null $markerWidth,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMarkerWidth;
        };

        $instance = $instance->attributes($attributes)->markerWidth($markerWidth);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::MARKER_WIDTH, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
