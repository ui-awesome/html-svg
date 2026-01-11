<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasRy;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RyProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasRy} trait functionality and behavior.
 *
 * Validates the management of the SVG `ry` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `ry` attribute in tag rendering, supporting float, int,
 * string and `null` for dynamic radius assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `ry` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `ry` attribute.
 * - Proper assignment and overriding of `ry` value.
 *
 * {@see RyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRyTest extends TestCase
{
    public function testReturnEmptyWhenRyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRy;
        };

        self::assertNotSame(
            $instance,
            $instance->ry(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RyProvider::class, 'values')]
    public function testSetRyAttributeValue(
        float|int|string|null $ry,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRy;
        };

        $instance = $instance->attributes($attributes)->ry($ry);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[SvgAttribute::RY->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
