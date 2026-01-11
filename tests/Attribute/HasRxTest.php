<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasRx;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RxProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasRx} trait functionality and behavior.
 *
 * Validates the management of the SVG `rx` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `rx` attribute in tag rendering, supporting float, int,
 * string and `null` for dynamic radius assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `rx` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `rx` attribute.
 * - Proper assignment and overriding of `rx` value.
 *
 * {@see RxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRxTest extends TestCase
{
    public function testReturnEmptyWhenRxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRx;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRx;
        };

        self::assertNotSame(
            $instance,
            $instance->rx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RxProvider::class, 'values')]
    public function testSetRxAttributeValue(
        float|int|string|null $rx,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRx;
        };

        $instance = $instance->attributes($attributes)->rx($rx);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[SvgAttribute::RX->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
