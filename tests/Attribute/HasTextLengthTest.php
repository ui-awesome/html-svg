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
 * Unit tests for the {@see HasTextLength} trait managing the `textLength` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `textLength` attribute is not provided.
 * - Sets the `textLength` SVG attribute and renders the expected output.
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
