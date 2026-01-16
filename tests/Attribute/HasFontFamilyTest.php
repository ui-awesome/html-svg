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
 * Unit test for the {@see HasFontFamily} trait managing the `font-family` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
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
