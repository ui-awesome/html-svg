<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasCy;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\CyProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasCy} trait functionality and behavior.
 *
 * Validates the management of the SVG `cy` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `cy` attribute in tag rendering, supporting int, float,
 * string and `null` for dynamic coordinate assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `cy` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `cy` attribute.
 * - Proper assignment and overriding of `cy` value.
 *
 * {@see CyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasCyTest extends TestCase
{
    public function testReturnEmptyWhenCyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingCyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCy;
        };

        self::assertNotSame(
            $instance,
            $instance->cy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CyProvider::class, 'values')]
    public function testSetCyAttributeValue(
        float|int|string|null $cy,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasCy;
        };

        $instance = $instance->attributes($attributes)->cy($cy);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::CY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
