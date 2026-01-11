<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasTransform;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\TransformProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasTransform} trait functionality and behavior.
 *
 * Validates the management of the SVG `transform` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `transform` attribute in tag rendering, supporting
 * string and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `transform` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `transform` attribute.
 * - Proper assignment and overriding of `transform` value.
 *
 * {@see TransformProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasTransformTest extends TestCase
{
    public function testReturnEmptyWhenTransformAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTransform;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingTransformAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasTransform;
        };

        self::assertNotSame(
            $instance,
            $instance->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(TransformProvider::class, 'values')]
    public function testSetTransformAttributeValue(
        string|null $transform,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasTransform;
        };

        $instance = $instance->attributes($attributes)->transform($transform);

        self::assertSame(
            $expectedValue,
            $instance->getAttributes()[SvgAttribute::TRANSFORM->value] ?? '',
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
