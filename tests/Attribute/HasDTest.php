<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasD;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\DProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasD} trait functionality and behavior.
 *
 * Validates the management of the SVG `d` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and rendering of the `d` attribute in tag rendering, supporting appropriate
 * types and `null` for dynamic path data assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `d` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `d` attribute.
 * - Proper assignment and overriding of `d` value.
 *
 * {@see DProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDTest extends TestCase
{
    public function testReturnEmptyWhenDAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasD;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasD;
        };

        self::assertNotSame(
            $instance,
            $instance->d(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DProvider::class, 'values')]
    public function testSetDAttributeValue(
        string|null $d,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasD;
        };

        $instance = $instance->attributes($attributes)->d($d);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::D, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
