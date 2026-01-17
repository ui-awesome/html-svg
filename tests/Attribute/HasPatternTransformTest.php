<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasPatternTransform;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\PatternTransformProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasPatternTransform} trait managing the `patternTransform` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `patternTransform` attribute is not provided.
 * - Sets the `patternTransform` SVG attribute and renders the expected output.
 *
 * {@see PatternTransformProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPatternTransformTest extends TestCase
{
    public function testReturnEmptyWhenPatternTransformAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternTransform;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPatternTransformAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPatternTransform;
        };

        self::assertNotSame(
            $instance,
            $instance->patternTransform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PatternTransformProvider::class, 'values')]
    public function testSetPatternTransformAttributeValue(
        string|null $patternTransform,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPatternTransform;
        };

        $instance = $instance->attributes($attributes)->patternTransform($patternTransform);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::PATTERN_TRANSFORM, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
