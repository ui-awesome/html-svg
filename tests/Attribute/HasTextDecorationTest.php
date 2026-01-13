<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasTextDecoration;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\TextDecorationProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Test suite for {@see HasTextDecoration} trait functionality and behavior.
 *
 * Validates the management of the SVG `text-decoration` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `text-decoration` attribute in tag rendering,
 * supporting appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `text-decoration` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `text-decoration` attribute.
 * - Proper assignment and overriding of `text-decoration` value.
 *
 * {@see TextDecorationProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasTextDecorationTest extends TestCase
{
    public function testReturnEmptyWhenTextDecorationAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTextDecoration;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTextDecorationAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTextDecoration;
        };

        self::assertNotSame(
            $instance,
            $instance->textDecoration(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TextDecorationProvider::class, 'values')]
    public function testSetTextDecorationAttributeValue(
        string|UnitEnum|null $textDecoration,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTextDecoration;
        };

        $instance = $instance->attributes($attributes)->textDecoration($textDecoration);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::TEXT_DECORATION, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
