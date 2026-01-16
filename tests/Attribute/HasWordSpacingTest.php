<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasWordSpacing;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\WordSpacingProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasWordSpacing} trait managing the `word-spacing` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see WordSpacingProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasWordSpacingTest extends TestCase
{
    public function testReturnEmptyWhenWordSpacingAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWordSpacing;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingWordSpacingAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWordSpacing;
        };

        self::assertNotSame(
            $instance,
            $instance->wordSpacing(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(WordSpacingProvider::class, 'values')]
    public function testSetWordSpacingAttributeValue(
        float|int|string|null $wordSpacing,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasWordSpacing;
        };

        $instance = $instance->attributes($attributes)->wordSpacing($wordSpacing);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::WORD_SPACING, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
