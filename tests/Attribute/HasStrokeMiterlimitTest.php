<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeMiterlimit;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeMiterlimitProvider;

/**
 * Test suite for {@see HasStrokeMiterlimit} trait functionality and behavior.
 *
 * Validates management of SVG `stroke-miterlimit` attribute according to SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of `stroke-miterlimit` attribute in tag rendering, supporting
 * int, string and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with `stroke-miterlimit` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
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
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeMiterlimitProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithStrokeMiterlimitAttribute(
        float|int|string|null $strokeMiterlimit,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        $instance = $instance->attributes($attributes)->strokeMiterlimit($strokeMiterlimit);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

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
            $instance->strokeMiterlimit('1'),
            'Should return a new instance when setting attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeMiterlimitProvider::class, 'values')]
    public function testSetStrokeMiterlimitAttributeValue(
        float|int|string|null $strokeMiterlimit,
        array $attributes,
        float|int|string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        $instance = $instance->attributes($attributes)->strokeMiterlimit($strokeMiterlimit);

        self::assertSame(
            $expected,
            $instance->getAttributes()['stroke-miterlimit'] ?? '',
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidNegativeStrokeMiterlimitValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        $instance->strokeMiterlimit(-5);
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidStringStrokeMiterlimitValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        $instance->strokeMiterlimit('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingLessThanOneStrokeMiterlimitValue(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeMiterlimit;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        $instance->strokeMiterlimit(0.9);
    }
}
