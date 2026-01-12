<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFontFamily;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FontFamilyProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasFontFamily} trait functionality and behavior.
 *
 * Validates the management of the SVG `font-family` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `font-family` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic offset assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `font-family` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `font-family` attribute.
 * - Proper assignment and overriding of `font-family` value.
 *
 * {@see FontFamilyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFontFamilyTest extends TestCase
{
    public function testReturnEmptyWhenFontFamilyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontFamily;
        };

        self::assertEmpty($instance->getAttributes(), 'Should have no attributes set when no attribute is provided.');
    }

    public function testReturnNewInstanceWhenSettingFontFamilyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontFamily;
        };

        self::assertNotSame($instance, $instance->fontFamily(''), 'Should return a new instance when setting the attribute, ensuring immutability.');
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FontFamilyProvider::class, 'values')]
    public function testSetFontFamilyAttributeValue(
        string|null $fontFamily,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFontFamily;
        };

        $instance = $instance->attributes($attributes)->fontFamily($fontFamily);

        self::assertSame($expectedValue, $instance->getAttribute(SvgAttribute::FONT_FAMILY, ''), $message);
        self::assertSame($expectedRenderAttribute, Attributes::render($instance->getAttributes()), $message);
    }
}
