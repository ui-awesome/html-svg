<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasRotate;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RotateProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasRotate} trait functionality and behavior.
 *
 * Validates the management of the SVG `rotate` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `rotate` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `rotate` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `rotate` attribute.
 * - Proper assignment and overriding of `rotate` value.
 *
 * {@see LetterSpacingProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRotateTest extends TestCase
{
    public function testReturnEmptyWhenRotateAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRotate;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRotateAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRotate;
        };

        self::assertNotSame(
            $instance,
            $instance->rotate(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RotateProvider::class, 'values')]
    public function testSetRotateAttributeValue(
        float|int|string|null $rotate,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRotate;
        };

        $instance = $instance->attributes($attributes)->rotate($rotate);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::ROTATE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
