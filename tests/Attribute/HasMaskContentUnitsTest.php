<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasMaskContentUnits;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\MaskContentUnitsProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasMaskContentUnits} trait functionality and behavior.
 *
 * Validates the management of the SVG `maskContentUnits` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `maskContentUnits` attribute in tag rendering,
 * supporting appropriate types and `null` for dynamic coordinate system assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `maskContentUnits` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `maskContentUnits` attribute.
 * - Proper assignment and overriding of `maskContentUnits` value.
 *
 * {@see MaskContentUnitsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMaskContentUnitsTest extends TestCase
{
    public function testReturnEmptyWhenMaskContentUnitsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskContentUnits;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMaskContentUnitsAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskContentUnits;
        };

        self::assertNotSame(
            $instance,
            $instance->maskContentUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MaskContentUnitsProvider::class, 'values')]
    public function testSetMaskContentUnitsAttributeValue(
        string|UnitEnum|null $maskContentUnits,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMaskContentUnits;
        };

        $instance = $instance->attributes($attributes)->maskContentUnits($maskContentUnits);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::MASK_CONTENT_UNITS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidMaskContentUnits(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskContentUnits;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MASK_CONTENT_UNITS->value,
                implode('\', \'', Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        $instance->maskContentUnits('invalid-value');
    }
}
