<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasGradientUnits;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\GradientUnitsProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Unit tests for the {@see HasGradientUnits} trait managing the `gradientUnits` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `gradientUnits` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `gradientUnits` SVG attribute and renders the expected output.
 *
 * {@see GradientUnitsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasGradientUnitsTest extends TestCase
{
    public function testReturnEmptyWhenGradientUnitsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasGradientUnits;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingGradientUnitsAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasGradientUnits;
        };

        self::assertNotSame(
            $instance,
            $instance->gradientUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(GradientUnitsProvider::class, 'values')]
    public function testSetGradientUnitsAttributeValue(
        string|UnitEnum|null $gradientUnits,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasGradientUnits;
        };

        $instance = $instance->attributes($attributes)->gradientUnits($gradientUnits);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::GRADIENT_UNITS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidGradientUnits(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasGradientUnits;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::GRADIENT_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        $instance->gradientUnits('invalid-value');
    }
}
