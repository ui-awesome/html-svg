<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasCx;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\CxProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasCx} trait managing the `cx` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `cx` attribute is not provided.
 * - Sets the `cx` SVG attribute and renders the expected output.
 *
 * {@see CxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasCxTest extends TestCase
{
    public function testReturnEmptyWhenCxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCx;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingCxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCx;
        };

        self::assertNotSame(
            $instance,
            $instance->cx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CxProvider::class, 'values')]
    public function testSetCxAttributeValue(
        float|int|string|null $cx,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasCx;
        };

        $instance = $instance->attributes($attributes)->cx($cx);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::CX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
