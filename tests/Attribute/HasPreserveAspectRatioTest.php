<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasPreserveAspectRatio;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\PreserveAspectRatioProvider;
use UIAwesome\Html\Svg\Values\{PreserveAspectRatio, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasPreserveAspectRatio} trait functionality and behavior.
 *
 * Validates the management of the SVG `preserveAspectRatio` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `preserveAspectRatio` attribute in tag rendering,
 * supporting string, UnitEnum, and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `preserveAspectRatio` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `preserveAspectRatio` attribute.
 * - Proper assignment and overriding of `preserveAspectRatio` value.
 *
 * {@see PreserveAspectRatioProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPreserveAspectRatioTest extends TestCase
{
    public function testReturnEmptyWhenPreserveAspectRatioAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPreserveAspectRatio;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPreserveAspectRatioAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPreserveAspectRatio;
        };

        self::assertNotSame(
            $instance,
            $instance->preserveAspectRatio(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PreserveAspectRatioProvider::class, 'values')]
    public function testSetPreserveAspectRatioAttributeValue(
        string|UnitEnum|null $preserveAspectRatio,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPreserveAspectRatio;
        };

        $instance = $instance->attributes($attributes)->preserveAspectRatio($preserveAspectRatio);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()['preserveAspectRatio'] ?? '',
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
            use HasPreserveAspectRatio;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::PRESERVE_ASPECT_RATIO->value,
                implode('\', \'', Enum::normalizeArray(PreserveAspectRatio::cases())),
            ),
        );

        $instance->preserveAspectRatio('invalid-value');
    }
}
