<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasCx;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\CxProvider;

/**
 * Test suite for {@see HasCx} trait functionality and behavior.
 *
 * Validates the management of the SVG `cx` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `cx` attribute in tag rendering, supporting int, float,
 * string and `null` for dynamic coordinate assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `cx` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `cx` attribute.
 * - Proper assignment and overriding of `cx` value.
 *
 * {@see CxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasCxTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CxProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithCxAttribute(
        float|int|string|null $cx,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasCx;
        };

        $instance = $instance->attributes($attributes)->cx($cx);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenCxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCx;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingCxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCx;
        };

        self::assertNotSame(
            $instance,
            $instance->cx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CxProvider::class, 'values')]
    public function testSetCxAttributeValue(
        float|int|string|null $cx,
        array $attributes,
        float|int|string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasCx;
        };

        $instance = $instance->attributes($attributes)->cx($cx);

        self::assertSame(
            $expected,
            $instance->getAttributes()['cx'] ?? '',
            $message,
        );
    }
}
