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
 * Unit tests for the {@see HasPatternUnits} trait managing the `patternUnits` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `patternUnits` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `patternUnits` SVG attribute and renders the expected output.
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
