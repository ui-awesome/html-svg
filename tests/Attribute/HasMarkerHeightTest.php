<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasMarkerHeight;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\MarkerHeightProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasMarkerHeight} trait managing the `markerHeight` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see MarkerHeightProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMarkerHeightTest extends TestCase
{
    public function testReturnEmptyWhenMarkerHeightAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMarkerHeight;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMarkerHeightAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMarkerHeight;
        };

        self::assertNotSame(
            $instance,
            $instance->markerHeight(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MarkerHeightProvider::class, 'values')]
    public function testSetMarkerHeightAttributeValue(
        float|int|string|null $markerHeight,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMarkerHeight;
        };

        $instance = $instance->attributes($attributes)->markerHeight($markerHeight);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::MARKER_HEIGHT, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
