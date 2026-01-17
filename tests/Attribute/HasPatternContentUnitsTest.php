<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasPatternContentUnits;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\PatternContentUnitsProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Unit tests for the {@see HasPatternContentUnits} trait managing the `patternContentUnits` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `patternContentUnits` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `patternContentUnits` SVG attribute and renders the expected output.
 *
 * {@see PatternContentUnitsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPatternContentUnitsTest extends TestCase
{
    public function testReturnEmptyWhenPatternContentUnitsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternContentUnits;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPatternContentUnitsAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternContentUnits;
        };

        self::assertNotSame(
            $instance,
            $instance->patternContentUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PatternContentUnitsProvider::class, 'values')]
    public function testSetPatternContentUnitsAttributeValue(
        string|UnitEnum|null $patternContentUnits,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPatternContentUnits;
        };

        $instance = $instance->attributes($attributes)->patternContentUnits($patternContentUnits);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::PATTERN_CONTENT_UNITS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidPatternContentUnits(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternContentUnits;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::PATTERN_CONTENT_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        $instance->patternContentUnits('invalid-value');
    }
}
