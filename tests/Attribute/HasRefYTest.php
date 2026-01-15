<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasRefY;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RefYProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasRefY} trait functionality and behavior.
 *
 * Validates the management of the SVG `refY` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `refY` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic reference point assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `refY` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `refY` attribute.
 * - Proper assignment and overriding of `refY` value.
 *
 * {@see RefYProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRefYTest extends TestCase
{
    public function testReturnEmptyWhenRefYAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRefY;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRefYAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRefY;
        };

        self::assertNotSame(
            $instance,
            $instance->refY(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RefYProvider::class, 'values')]
    public function testSetRefYAttributeValue(
        float|int|string|null $refY,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRefY;
        };

        $instance = $instance->attributes($attributes)->refY($refY);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::REF_Y, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
