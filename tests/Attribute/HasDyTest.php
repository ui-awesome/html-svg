<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasDy;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\DyProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasDy} trait managing the `dy` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `dy` attribute is not provided.
 * - Sets the `dy` SVG attribute and renders the expected output.
 *
 * {@see DyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDyTest extends TestCase
{
    public function testReturnEmptyWhenDyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDy;
        };

        self::assertNotSame(
            $instance,
            $instance->dy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DyProvider::class, 'values')]
    public function testSetDyAttributeValue(
        float|int|string|null $dy,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDy;
        };

        $instance = $instance->attributes($attributes)->dy($dy);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::DY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
