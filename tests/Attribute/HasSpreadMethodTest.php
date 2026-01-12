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
 * Test suite for {@see HasSpreadMethod} trait functionality and behavior.
 *
 * Validates the management of the SVG `spreadMethod` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `spreadMethod` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `spreadMethod` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `spreadMethod` attribute.
 * - Proper assignment and overriding of `spreadMethod` value.
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

    public function testThrowInvalidArgumentExceptionForSettingStringInvalidValue(): void
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
                implode('\', \'', Enum::normalizeArray(SpreadMethod::cases())),
            ),
        );

        $instance->spreadMethod('invalid-value');
    }
}
