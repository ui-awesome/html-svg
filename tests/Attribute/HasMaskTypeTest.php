<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasMaskType;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\MaskTypeProvider;
use UIAwesome\Html\Svg\Values\{MaskType, SvgAttribute};
use UnitEnum;

/**
 * Test suite for {@see HasMaskType} trait functionality and behavior.
 *
 * Validates the management of the SVG `mask-type` attribute according to the CSS Masking Module Level 1 specification.
 *
 * Ensures correct handling, immutability, and validation of the `mask-type` attribute in tag rendering, supporting
 * appropriate types and `null` for attribute removal.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `mask-type` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `mask-type` attribute.
 * - Proper assignment and overriding of `mask-type` value.
 *
 * {@see MaskTypeProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasMaskTypeTest extends TestCase
{
    public function testReturnEmptyWhenMaskTypeAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskType;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingMaskTypeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskType;
        };

        self::assertNotSame(
            $instance,
            $instance->maskType(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(MaskTypeProvider::class, 'values')]
    public function testSetMaskTypeAttributeValue(
        string|UnitEnum|null $maskType,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasMaskType;
        };

        $instance = $instance->attributes($attributes)->maskType($maskType);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::MASK_TYPE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidMaskType(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasMaskType;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MASK_TYPE->value,
                implode("', '", Enum::normalizeArray(MaskType::cases())),
            ),
        );

        $instance->maskType('invalid-value');
    }
}
