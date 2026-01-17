<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeDashArray;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeDashArrayProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasStrokeDashArray} trait managing the `stroke-dasharray` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `stroke-dasharray` attribute is not provided.
 * - Sets the `stroke-dasharray` SVG attribute and renders the expected output.
 *
 * {@see StrokeDashArrayProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeDashArrayTest extends TestCase
{
    public function testReturnEmptyWhenStrokeDashArrayAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeDashArray;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeDashArrayAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeDashArray;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeDashArray(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeDashArrayProvider::class, 'values')]
    public function testSetStrokeDashArrayAttributeValue(
        float|int|string|null $strokeDashArray,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeDashArray;
        };

        $instance = $instance->attributes($attributes)->strokeDashArray($strokeDashArray);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::STROKE_DASHARRAY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
