<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasMarkerUnits;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\MarkerUnitsProvider;
use UIAwesome\Html\Svg\Values\{MarkerUnits, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasMarkerUnits} trait functionality and behavior.
 *
 * Validates the management of the SVG `markerUnits` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `markerUnits` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic coordinate system assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `markerUnits` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `markerUnits` attribute.
 * - Proper assignment and overriding of `markerUnits` value.
 *
 * {@see MarkerUnitsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMarkerUnitsTest extends TestCase
{
    public function testReturnEmptyWhenMarkerUnitsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMarkerUnits;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMarkerUnitsAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMarkerUnits;
        };

        self::assertNotSame(
            $instance,
            $instance->markerUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MarkerUnitsProvider::class, 'values')]
    public function testSetMarkerUnitsAttributeValue(
        string|UnitEnum|null $markerUnits,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMarkerUnits;
        };

        $instance = $instance->attributes($attributes)->markerUnits($markerUnits);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::MARKER_UNITS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidMarkerUnits(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMarkerUnits;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MARKER_UNITS->value,
                implode("', '", Enum::normalizeArray(MarkerUnits::cases())),
            ),
        );

        $instance->markerUnits('invalid-value');
    }
}
