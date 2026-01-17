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
 * Unit tests for the {@see HasMaskUnits} trait managing the `maskUnits` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `maskUnits` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `maskUnits` SVG attribute and renders the expected output.
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
