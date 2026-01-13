<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasTextAnchor;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\TextAnchorProvider;
use UIAwesome\Html\Svg\Values\{SvgAttribute, TextAnchor};
use UnitEnum;

/**
 * Test suite for {@see HasTextAnchor} trait functionality and behavior.
 *
 * Validates the management of the SVG `text-anchor` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `text-anchor` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `text-anchor` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `text-anchor` attribute.
 * - Proper assignment and overriding of `text-anchor` value.
 *
 * {@see TextAnchorProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasTextAnchorTest extends TestCase
{
    public function testReturnEmptyWhenTextAnchorAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTextAnchor;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTextAnchorAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTextAnchor;
        };

        self::assertNotSame(
            $instance,
            $instance->textAnchor(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TextAnchorProvider::class, 'values')]
    public function testSetTextAnchorAttributeValue(
        string|UnitEnum|null $textAnchor,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTextAnchor;
        };

        $instance = $instance->attributes($attributes)->textAnchor($textAnchor);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::TEXT_ANCHOR, ''),
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
            use HasTextAnchor;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::TEXT_ANCHOR->value,
                implode("', '", Enum::normalizeArray(TextAnchor::cases())),
            ),
        );

        $instance->textAnchor('invalid-value');
    }
}
