<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeOpacity;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeOpacityProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasStrokeOpacity} trait managing the `stroke-opacity` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `stroke-opacity` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `stroke-opacity` SVG attribute and renders the expected output.
 *
 * {@see StrokeOpacityProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeOpacityTest extends TestCase
{
    public function testReturnEmptyWhenStrokeOpacityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeOpacityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeOpacity(0.5),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeOpacityProvider::class, 'values')]
    public function testSetStrokeOpacityAttributeValue(
        float|int|string|null $strokeOpacity,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeOpacity;
        };

        $instance = $instance->attributes($attributes)->strokeOpacity($strokeOpacity);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::STROKE_OPACITY, ''),
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
            use HasStrokeOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->strokeOpacity(1.1);
    }
}
