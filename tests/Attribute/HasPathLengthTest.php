<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasPathLength;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\PathLengthProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasPathLength} trait functionality and behavior.
 *
 * Validates the management of the SVG `pathLength` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `pathLength` attribute in tag rendering, supporting
 * float, int, string and `null` for dynamic path length assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `pathLength` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Error handling for invalid attributes.
 * - Immutability of the trait's API when setting or overriding the `pathLength` attribute.
 * - Proper assignment and overriding of `pathLength` value.
 *
 * {@see PathLengthProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPathLengthTest extends TestCase
{
    public function testReturnEmptyWhenPathLengthAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPathLength;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPathLengthAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPathLength;
        };

        self::assertNotSame(
            $instance,
            $instance->pathLength(10),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PathLengthProvider::class, 'values')]
    public function testSetPathLengthAttributeValue(
        float|int|string|null $pathLength,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPathLength;
        };

        $instance = $instance->attributes($attributes)->pathLength($pathLength);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[SvgAttribute::PATH_LENGTH->value] ?? '',
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
            use HasPathLength;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL->getMessage(),
        );

        $instance->pathLength('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingValueNegative(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPathLength;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL->getMessage(),
        );

        $instance->pathLength(-5);
    }
}
