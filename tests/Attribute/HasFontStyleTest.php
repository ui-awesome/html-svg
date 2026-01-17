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
 * Unit tests for the {@see HasFontStyle} trait managing the `font-style` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `font-style` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `font-style` SVG attribute and renders the expected output.
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

    public function testThrowInvalidArgumentExceptionForInvalidFontStyle(): void
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
