<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasX1;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\X1Provider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasX1} trait functionality and behavior.
 *
 * Validates the management of the SVG `x1` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `x1` attribute in tag rendering, supporting appropriate
 * types and `null` for dynamic coordinate assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `x1` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `x1` attribute.
 * - Proper assignment and overriding of `x1` value.
 *
 * {@see X1Provider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasX1Test extends TestCase
{
    public function testReturnEmptyWhenX1AttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX1;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingX1Attribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX1;
        };

        self::assertNotSame(
            $instance,
            $instance->x1(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(X1Provider::class, 'values')]
    public function testSetX1AttributeValue(
        float|int|string|null $x1,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasX1;
        };

        $instance = $instance->attributes($attributes)->x1($x1);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::X1, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
