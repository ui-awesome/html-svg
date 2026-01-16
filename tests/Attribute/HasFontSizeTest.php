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
 * Unit test for the {@see HasFontSize} trait managing the `font-size` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
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
