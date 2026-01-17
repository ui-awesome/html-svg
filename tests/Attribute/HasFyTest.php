<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFy;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FyProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasFy} trait managing the `fy` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `fy` attribute is not provided.
 * - Sets the `fy` SVG attribute and renders the expected output.
 *
 * {@see FyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFyTest extends TestCase
{
    public function testReturnEmptyWhenFyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFy;
        };

        self::assertNotSame(
            $instance,
            $instance->fy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FyProvider::class, 'values')]
    public function testSetFyAttributeValue(
        float|int|string|null $fy,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFy;
        };

        $instance = $instance->attributes($attributes)->fy($fy);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::FY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
