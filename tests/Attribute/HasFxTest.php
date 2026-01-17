<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFx;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FxProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasFx} trait managing the `fx` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `fx` attribute is not provided.
 * - Sets the `fx` SVG attribute and renders the expected output.
 *
 * {@see FxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFxTest extends TestCase
{
    public function testReturnEmptyWhenFxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFx;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFx;
        };

        self::assertNotSame(
            $instance,
            $instance->fx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FxProvider::class, 'values')]
    public function testSetFxAttributeValue(
        float|int|string|null $fx,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFx;
        };

        $instance = $instance->attributes($attributes)->fx($fx);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::FX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
