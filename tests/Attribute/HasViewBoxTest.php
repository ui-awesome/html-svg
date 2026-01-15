<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasViewBox;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\ViewBoxProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasViewBox} trait functionality and behavior.
 *
 * Validates the management of the SVG `viewBox` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `viewBox` attribute in tag rendering, supporting string
 * type and `null` for dynamic viewport assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `viewBox` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `viewBox` attribute.
 * - Proper assignment and overriding of `viewBox` value.
 *
 * {@see ViewBoxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasViewBoxTest extends TestCase
{
    public function testReturnEmptyWhenViewBoxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasViewBox;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingViewBoxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasViewBox;
        };

        self::assertNotSame(
            $instance,
            $instance->viewBox(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ViewBoxProvider::class, 'values')]
    public function testSetViewBoxAttributeValue(
        string|null $viewBox,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasViewBox;
        };

        $instance = $instance->attributes($attributes)->viewBox($viewBox);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::VIEW_BOX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
