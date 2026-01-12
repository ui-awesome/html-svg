<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasY;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\YProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasY} trait functionality and behavior.
 *
 * Validates the management of the SVG `y` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `y` attribute in tag rendering, supporting appropriate
 * types and `null` for dynamic coordinate assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `y` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `y` attribute.
 * - Proper assignment and overriding of `y` value.
 *
 * {@see YProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasYTest extends TestCase
{
    public function testReturnEmptyWhenYAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasY;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingYAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasY;
        };

        self::assertNotSame(
            $instance,
            $instance->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(YProvider::class, 'values')]
    public function testSetYAttributeValue(
        float|int|string|null $y,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasY;
        };

        $instance = $instance->attributes($attributes)->y($y);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::Y, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
