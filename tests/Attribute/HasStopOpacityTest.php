<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStopOpacity;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StopOpacityProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasStopOpacity} trait managing the `stop-opacity` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `stop-opacity` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `stop-opacity` SVG attribute and renders the expected output.
 *
 * {@see StopOpacityProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStopOpacityTest extends TestCase
{
    public function testReturnEmptyWhenStopOpacityAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStopOpacity;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStopOpacityAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStopOpacity;
        };

        self::assertNotSame(
            $instance,
            $instance->stopOpacity(0.5),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StopOpacityProvider::class, 'values')]
    public function testSetStopOpacityAttributeValue(
        float|int|string|null $stopOpacity,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStopOpacity;
        };

        $instance = $instance->attributes($attributes)->stopOpacity($stopOpacity);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::STOP_OPACITY, ''),
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
            use HasStopOpacity;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        $instance->stopOpacity(1.1);
    }
}
