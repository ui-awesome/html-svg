<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasViewBox;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\ViewBoxProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasViewBox} trait managing the `viewBox` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `viewBox` attribute is not provided.
 * - Sets the `viewBox` SVG attribute and renders the expected output.
 *
 * {@see ViewBoxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasViewBoxTest extends TestCase
{
    public function testReturnEmptyWhenViewBoxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasViewBox;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingViewBoxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasViewBox;
        };

        self::assertNotSame(
            $instance,
            $instance->viewBox(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(ViewBoxProvider::class, 'values')]
    public function testSetViewBoxAttributeValue(
        string|null $viewBox,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasViewBox;
        };

        $instance = $instance->attributes($attributes)->viewBox($viewBox);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::VIEW_BOX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
