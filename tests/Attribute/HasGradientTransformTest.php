<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasGradientTransform;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\GradientTransformProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasGradientTransform} trait managing the `gradientTransform` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `gradientTransform` attribute is not provided.
 * - Sets the `gradientTransform` SVG attribute and renders the expected output.
 *
 * {@see GradientTransformProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasGradientTransformTest extends TestCase
{
    public function testReturnEmptyWhenGradientTransformAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasGradientTransform;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingGradientTransformAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasGradientTransform;
        };

        self::assertNotSame(
            $instance,
            $instance->gradientTransform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(GradientTransformProvider::class, 'values')]
    public function testSetGradientTransformAttributeValue(
        string|null $gradientTransform,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasGradientTransform;
        };

        $instance = $instance->attributes($attributes)->gradientTransform($gradientTransform);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::GRADIENT_TRANSFORM, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
