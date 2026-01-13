<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasLetterSpacing;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\LetterSpacingProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasLetterSpacing} trait functionality and behavior.
 *
 * Validates the management of the SVG `letter-spacing` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `letter-spacing` attribute in tag rendering,
 * supporting appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `letter-spacing` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `letter-spacing` attribute.
 * - Proper assignment and overriding of `letter-spacing` value.
 *
 * {@see LetterSpacingProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasLetterSpacingTest extends TestCase
{
    public function testReturnEmptyWhenLetterSpacingAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLetterSpacing;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingLetterSpacingAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLetterSpacing;
        };

        self::assertNotSame(
            $instance,
            $instance->letterSpacing(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(LetterSpacingProvider::class, 'values')]
    public function testSetLetterSpacingAttributeValue(
        float|int|string|null $letterSpacing,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasLetterSpacing;
        };

        $instance = $instance->attributes($attributes)->letterSpacing($letterSpacing);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::LETTER_SPACING, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
