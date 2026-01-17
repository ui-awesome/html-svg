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
 * Unit tests for the {@see HasTextAnchor} trait managing the `text-anchor` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `text-anchor` attribute is not provided.
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Sets the `text-anchor` SVG attribute and renders the expected output.
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

    public function testThrowInvalidArgumentExceptionForInvalidTextAnchor(): void
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
