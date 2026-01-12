<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasDx;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\DxProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasDx} trait functionality and behavior.
 *
 * Validates the management of the SVG `dx` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `dx` attribute in tag rendering, supporting appropriate
 * types and `null` for dynamic offset assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `dx` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `dx` attribute.
 * - Proper assignment and overriding of `dx` value.
 *
 * {@see DxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDxTest extends TestCase
{
    public function testReturnEmptyWhenDxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDx;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDx;
        };

        self::assertNotSame(
            $instance,
            $instance->dx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DxProvider::class, 'values')]
    public function testSetDxAttributeValue(
        float|int|string|null $dx,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDx;
        };

        $instance = $instance->attributes($attributes)->dx($dx);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::DX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
