<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeLineCap;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeLineCapProvider;
use UIAwesome\Html\Svg\Values\{StrokeLineCap, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasStrokeLineCap} trait functionality and behavior.
 *
 * Validates the management of the SVG `stroke-linecap` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `stroke-linecap` attribute in tag rendering, supporting
 * both string and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `stroke-linecap` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `stroke-linecap` attribute.
 * - Proper assignment and overriding of `stroke-linecap` value.
 *
 * {@see StrokeLineCapProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeLineCapTest extends TestCase
{
    public function testReturnEmptyWhenStrokeLineCapAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeLineCap;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeLineCapAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeLineCap;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeLineCap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeLineCapProvider::class, 'values')]
    public function testSetStrokeLineCapAttributeValue(
        string|UnitEnum|null $strokeLineCap,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeLineCap;
        };

        $instance = $instance->attributes($attributes)->strokeLineCap($strokeLineCap);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()['stroke-linecap'] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingStringInvalidValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeLineCap;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::STROKE_LINECAP->value,
                implode('\', \'', Enum::normalizeArray(StrokeLineCap::cases())),
            ),
        );

        $instance->strokeLineCap('invalid-value');
    }
}
