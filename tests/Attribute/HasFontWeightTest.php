<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFontWeight;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FontWeightProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasFontWeight} trait managing the `font-weight` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `font-weight` attribute is not provided.
 * - Sets the `font-weight` SVG attribute and renders the expected output.
 *
 * {@see FontWeightProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFontWeightTest extends TestCase
{
    public function testReturnEmptyWhenFontWeightAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontWeight;
        };

        self::assertEmpty($instance->getAttributes(), 'Should have no attributes set when no attribute is provided.');
    }

    public function testReturnNewInstanceWhenSettingFontWeightAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontWeight;
        };

        self::assertNotSame($instance, $instance->fontWeight(''), 'Should return a new instance when setting the attribute, ensuring immutability.');
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FontWeightProvider::class, 'values')]
    public function testSetFontWeightAttributeValue(
        int|string|null $fontWeight,
        array $attributes,
        int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFontWeight;
        };

        $instance = $instance->attributes($attributes)->fontWeight($fontWeight);

        self::assertSame($expectedValue, $instance->getAttribute(SvgAttribute::FONT_WEIGHT, ''), $message);
        self::assertSame($expectedRenderAttribute, Attributes::render($instance->getAttributes()), $message);
    }
}
