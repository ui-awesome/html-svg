<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasOrient;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\OrientProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Test suite for {@see HasOrient} trait functionality and behavior.
 *
 * Validates the management of the SVG `orient` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `orient` attribute in tag rendering, supporting
 * appropriate types (enum keywords, numeric angles, strings) and `null` for dynamic orientation assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `orient` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `orient` attribute.
 * - Proper assignment and overriding of `orient` value.
 *
 * {@see OrientProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasOrientTest extends TestCase
{
    public function testReturnEmptyWhenOrientAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOrient;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingOrientAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasOrient;
        };

        self::assertNotSame(
            $instance,
            $instance->orient(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(OrientProvider::class, 'values')]
    public function testSetOrientAttributeValue(
        float|int|string|UnitEnum|null $orient,
        array $attributes,
        float|int|string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasOrient;
        };

        $instance = $instance->attributes($attributes)->orient($orient);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::ORIENT, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
