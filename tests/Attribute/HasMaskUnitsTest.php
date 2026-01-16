<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasMaskUnits;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\MaskUnitsProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasMaskUnits} trait functionality and behavior.
 *
 * Validates the management of the SVG `maskUnits` attribute according to the CSS Masking Module Level 1 specification.
 *
 * Ensures correct handling, immutability, and validation of the `maskUnits` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic coordinate system assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `maskUnits` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `maskUnits` attribute.
 * - Proper assignment and overriding of `maskUnits` value.
 *
 * {@see MaskUnitsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMaskUnitsTest extends TestCase
{
    public function testReturnEmptyWhenMaskUnitsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskUnits;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMaskUnitsAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskUnits;
        };

        self::assertNotSame(
            $instance,
            $instance->maskUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MaskUnitsProvider::class, 'values')]
    public function testSetMaskUnitsAttributeValue(
        string|UnitEnum|null $maskUnits,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMaskUnits;
        };

        $instance = $instance->attributes($attributes)->maskUnits($maskUnits);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::MASK_UNITS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidMaskUnits(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskUnits;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MASK_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        $instance->maskUnits('invalid-value');
    }
}
