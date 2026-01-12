<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStroke;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasStroke} trait functionality and behavior.
 *
 * Validates the management of the SVG `stroke` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `stroke` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `stroke` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `stroke` attribute.
 * - Proper assignment and overriding of `stroke` value.
 *
 * {@see StrokeProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeTest extends TestCase
{
    public function testReturnEmptyWhenStrokeAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStroke;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStroke;
        };

        self::assertNotSame(
            $instance,
            $instance->stroke(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeProvider::class, 'values')]
    public function testSetStrokeAttributeValue(
        string|null $stroke,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStroke;
        };

        $instance = $instance->attributes($attributes)->stroke($stroke);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::STROKE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
