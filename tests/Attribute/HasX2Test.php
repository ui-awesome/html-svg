<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasX2;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\X2Provider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasX2} trait functionality and behavior.
 *
 * Validates the management of the SVG `x2` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `x2` attribute in tag rendering, supporting float, int,
 * string, and `null` for dynamic coordinate assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `x2` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `x2` attribute.
 * - Proper assignment and overriding of `x2` value.
 *
 * {@see X2Provider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasX2Test extends TestCase
{
    public function testReturnEmptyWhenX2AttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX2;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingX2Attribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX2;
        };

        self::assertNotSame(
            $instance,
            $instance->x2(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(X2Provider::class, 'values')]
    public function testSetX2AttributeValue(
        float|int|string|null $x2,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasX2;
        };

        $instance = $instance->attributes($attributes)->x2($x2);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[SvgAttribute::X2->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
