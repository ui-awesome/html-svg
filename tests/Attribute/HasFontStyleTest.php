<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFontStyle;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FontStyleProvider;
use UIAwesome\Html\Svg\Values\{FontStyle, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasFontStyle} trait functionality and behavior.
 *
 * Validates the management of the SVG `font-style` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `font-style` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic offset assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `font-style` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `font-style` attribute.
 * - Proper assignment and overriding of `font-style` value.
 *
 * {@see FontStyleProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFontStyleTest extends TestCase
{
    public function testReturnEmptyWhenFontStyleAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontStyle;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFontStyleAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontStyle;
        };

        self::assertNotSame(
            $instance,
            $instance->fontStyle(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FontStyleProvider::class, 'values')]
    public function testSetFontStyleAttributeValue(
        string|UnitEnum|null $fontStyle,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFontStyle;
        };

        $instance = $instance->attributes($attributes)->fontStyle($fontStyle);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::FONT_STYLE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingStringInvalidValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontStyle;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::FONT_STYLE->value,
                implode("', '", Enum::normalizeArray(FontStyle::cases())),
            ),
        );

        $instance->fontStyle('invalid-value');
    }
}
