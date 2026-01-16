<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasPatternUnits;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\PatternUnitsProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasPatternUnits} trait functionality and behavior.
 *
 * Validates the management of the SVG `patternUnits` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `patternUnits` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic coordinate system assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `patternUnits` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `patternUnits` attribute.
 * - Proper assignment and overriding of `patternUnits` value.
 *
 * {@see PatternUnitsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPatternUnitsTest extends TestCase
{
    public function testReturnEmptyWhenPatternUnitsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternUnits;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPatternUnitsAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternUnits;
        };

        self::assertNotSame(
            $instance,
            $instance->patternUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PatternUnitsProvider::class, 'values')]
    public function testSetPatternUnitsAttributeValue(
        string|UnitEnum|null $patternUnits,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPatternUnits;
        };

        $instance = $instance->attributes($attributes)->patternUnits($patternUnits);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::PATTERN_UNITS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidPatternUnits(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternUnits;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::PATTERN_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        $instance->patternUnits('invalid-value');
    }
}
