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
 * Unit test for the {@see HasStrokeLineJoin} trait managing the `stroke-linejoin` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
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
            $instance->getAttribute(SvgAttribute::STROKE_LINEJOIN, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidStrokeLineJoin(): void
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
                implode("', '", Enum::normalizeArray(StrokeLineJoin::cases())),
            ),
        );

        $instance->strokeLineJoin('invalid-value');
    }
}
