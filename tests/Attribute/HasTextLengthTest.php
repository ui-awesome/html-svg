<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasTextLength;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\TextLengthProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasTextLength} trait functionality and behavior.
 *
 * Validates the management of the SVG `textLength` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `textLength` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic coordinate assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `textLength` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `textLength` attribute.
 * - Proper assignment and overriding of `textLength` value.
 *
 * {@see TextLengthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasTextLengthTest extends TestCase
{
    public function testReturnEmptyWhenTextLengthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTextLength;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTextLengthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTextLength;
        };

        self::assertNotSame(
            $instance,
            $instance->textLength(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TextLengthProvider::class, 'values')]
    public function testSetTextLengthAttributeValue(
        float|int|string|null $textLength,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTextLength;
        };

        $instance = $instance->attributes($attributes)->textLength($textLength);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::TEXT_LENGTH, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
