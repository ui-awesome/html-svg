<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasWritingMode;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\WritingModeProvider;
use UIAwesome\Html\Svg\Values\{SvgAttribute, WritingMode};
use UnitEnum;

/**
 * Test suite for {@see HasWritingMode} trait functionality and behavior.
 *
 * Validates the management of the SVG `writing-mode` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `writing-mode` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `writing-mode` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `writing-mode` attribute.
 * - Proper assignment and overriding of `writing-mode` value.
 *
 * {@see WritingModeProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasWritingModeTest extends TestCase
{
    public function testReturnEmptyWhenWritingModeAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWritingMode;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingWritingModeAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWritingMode;
        };

        self::assertNotSame(
            $instance,
            $instance->writingMode(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(WritingModeProvider::class, 'values')]
    public function testSetWritingModeAttributeValue(
        string|UnitEnum|null $writingMode,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasWritingMode;
        };

        $instance = $instance->attributes($attributes)->writingMode($writingMode);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::WRITING_MODE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidWritingMode(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasWritingMode;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::WRITING_MODE->value,
                implode("', '", Enum::normalizeArray(WritingMode::cases())),
            ),
        );

        $instance->writingMode('invalid-value');
    }
}
