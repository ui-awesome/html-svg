<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasOpacity;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\OpacityProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasOpacity} trait managing the `opacity` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `opacity` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `opacity` SVG attribute and renders the expected output.
 *
 * {@see OpacityProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasOpacityTest extends TestCase
{
    public function testReturnEmptyWhenOpacityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingOpacityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        self::assertNotSame(
            $instance,
            $instance->opacity(0.5),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(OpacityProvider::class, 'values')]
    public function testSetOpacityAttributeValue(
        float|int|string|null $opacity,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        $instance = $instance->attributes($attributes)->opacity($opacity);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::OPACITY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingValueIsGreaterThanOne(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->opacity(1.1);
    }
}
