<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFontSize;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FontSizeProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasFontSize} trait functionality and behavior.
 *
 * Validates the management of the SVG `font-size` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `font-size` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic offset assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `font-size` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `font-size` attribute.
 * - Proper assignment and overriding of `font-size` value.
 *
 * {@see FontSizeProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFontSizeTest extends TestCase
{
    public function testReturnEmptyWhenFontSizeAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontSize;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFontSizeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFontSize;
        };

        self::assertNotSame(
            $instance,
            $instance->fontSize(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FontSizeProvider::class, 'values')]
    public function testSetFontSizeAttributeValue(
        float|int|string|null $fontSize,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFontSize;
        };

        $instance = $instance->attributes($attributes)->fontSize($fontSize);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::FONT_SIZE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
