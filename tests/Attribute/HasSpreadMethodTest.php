<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasSpreadMethod;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\SpreadMethodProvider;
use UIAwesome\Html\Svg\Values\{SpreadMethod, SvgAttribute};
use UnitEnum;

/**
 * Unit test for the {@see HasSpreadMethod} trait managing the `spreadMethod` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see SpreadMethodProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasSpreadMethodTest extends TestCase
{
    public function testReturnEmptyWhenSpreadMethodAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSpreadMethod;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingSpreadMethodAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSpreadMethod;
        };

        self::assertNotSame(
            $instance,
            $instance->spreadMethod(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(SpreadMethodProvider::class, 'values')]
    public function testSetSpreadMethodAttributeValue(
        string|UnitEnum|null $spreadMethod,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasSpreadMethod;
        };

        $instance = $instance->attributes($attributes)->spreadMethod($spreadMethod);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::SPREAD_METHOD, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidSpreadMethod(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasSpreadMethod;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::SPREAD_METHOD->value,
                implode("', '", Enum::normalizeArray(SpreadMethod::cases())),
            ),
        );

        $instance->spreadMethod('invalid-value');
    }
}
