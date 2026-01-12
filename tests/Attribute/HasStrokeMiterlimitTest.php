<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeMiterlimit;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeMiterlimitProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasStrokeMiterlimit} trait functionality and behavior.
 *
 * Validates management of SVG `stroke-miterlimit` attribute according to SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of `stroke-miterlimit` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with `stroke-miterlimit` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of trait's API when setting or overriding `stroke-miterlimit` attribute.
 * - Proper assignment and overriding of `stroke-miterlimit` value.
 *
 * {@see StrokeMiterlimitProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeMiterlimitTest extends TestCase
{
    public function testReturnEmptyWhenStrokeMiterlimitAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeMiterlimitAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeMiterlimit(1),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeMiterlimitProvider::class, 'values')]
    public function testSetStrokeMiterlimitAttributeValue(
        float|int|string|null $strokeMiterLimit,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        $instance = $instance->attributes($attributes)->strokeMiterlimit($strokeMiterLimit);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::STROKE_MITERLIMIT, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingValueIsLessThanOne(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        $instance->strokeMiterlimit(0.5);
    }
}
