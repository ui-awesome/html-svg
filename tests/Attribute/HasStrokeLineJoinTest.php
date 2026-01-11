<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeLineJoin;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeLineJoinProvider;
use UIAwesome\Html\Svg\Values\{StrokeLineJoin, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasStrokeLineJoin} trait functionality and behavior.
 *
 * Validates the management of the SVG `stroke-linejoin` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `stroke-linejoin` attribute in tag rendering,
 * supporting string and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `stroke-linejoin` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `stroke-linejoin` attribute.
 * - Proper assignment and overriding of `stroke-linejoin` value.
 *
 * {@see StrokeLineJoinProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeLineJoinTest extends TestCase
{
    public function testReturnEmptyWhenStrokeLineJoinAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeLineJoin;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeLineJoinAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeLineJoin;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeLineJoin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeLineJoinProvider::class, 'values')]
    public function testSetStrokeLineJoinAttributeValue(
        string|UnitEnum|null $strokeLineJoin,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeLineJoin;
        };

        $instance = $instance->attributes($attributes)->strokeLineJoin($strokeLineJoin);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()['stroke-linejoin'] ?? '',
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
            use HasStrokeLineJoin;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::STROKE_LINEJOIN->value,
                implode('\', \'', Enum::normalizeArray(StrokeLineJoin::cases())),
            ),
        );

        $instance->strokeLineJoin('invalid-value');
    }
}
