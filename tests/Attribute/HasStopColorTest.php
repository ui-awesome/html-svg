<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStopColor;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StopColorProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasStopColor} trait managing the `stop-color` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `stop-color` attribute is not provided.
 * - Sets the `stop-color` SVG attribute and renders the expected output.
 *
 * {@see StopColorProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStopColorTest extends TestCase
{
    public function testReturnEmptyWhenStopColorAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStopColor;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStopColorAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStopColor;
        };

        self::assertNotSame(
            $instance,
            $instance->stopColor(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StopColorProvider::class, 'values')]
    public function testSetStopColorAttributeValue(
        string|null $stopColor,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStopColor;
        };

        $instance = $instance->attributes($attributes)->stopColor($stopColor);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::STOP_COLOR, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
