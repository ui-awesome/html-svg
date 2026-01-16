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
 * Unit test for the {@see HasMarkerWidth} trait managing the `markerWidth` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
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
