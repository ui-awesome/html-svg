<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasX;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\XProvider;

/**
 * Test suite for {@see HasX} trait functionality and behavior.
 *
 * Validates the management of the SVG `x` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `x` attribute in tag rendering, supporting float, int,
 * string, and `null` for dynamic coordinate assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `x` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `x` attribute.
 * - Proper assignment and overriding of `x` value.
 *
 * {@see XProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasXTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(XProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithXAttribute(
        float|int|string|null $x,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasX;
        };

        $instance = $instance->attributes($attributes)->x($x);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenXAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingXAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX;
        };

        self::assertNotSame(
            $instance,
            $instance->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(XProvider::class, 'values')]
    public function testSetXAttributeValue(
        float|int|string|null $x,
        array $attributes,
        float|int|string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasX;
        };

        $instance = $instance->attributes($attributes)->x($x);

        self::assertSame(
            $expected,
            $instance->getAttributes()['x'] ?? '',
            $message,
        );
    }
}
