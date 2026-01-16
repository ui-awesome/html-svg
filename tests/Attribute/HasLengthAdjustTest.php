<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasLengthAdjust;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\LengthAdjustProvider;
use UIAwesome\Html\Svg\Values\{LengthAdjust, SvgAttribute};
use UnitEnum;

/**
 * Unit test for the {@see HasLengthAdjust} trait managing the `lengthAdjust` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see LengthAdjustProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasLengthAdjustTest extends TestCase
{
    public function testReturnEmptyWhenLengthAdjustAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLengthAdjust;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingLengthAdjustAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLengthAdjust;
        };

        self::assertNotSame(
            $instance,
            $instance->lengthAdjust(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(LengthAdjustProvider::class, 'values')]
    public function testSetLengthAdjustAttributeValue(
        string|UnitEnum|null $lengthAdjust,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasLengthAdjust;
        };

        $instance = $instance->attributes($attributes)->lengthAdjust($lengthAdjust);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::LENGTH_ADJUST, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidLengthAdjust(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasLengthAdjust;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::LENGTH_ADJUST->value,
                implode("', '", Enum::normalizeArray(LengthAdjust::cases())),
            ),
        );

        $instance->lengthAdjust('invalid-value');
    }
}
