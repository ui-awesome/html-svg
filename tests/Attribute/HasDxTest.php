<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasDx;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\DxProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasDx} trait managing the `dx` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see DxProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDxTest extends TestCase
{
    public function testReturnEmptyWhenDxAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDx;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDxAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDx;
        };

        self::assertNotSame(
            $instance,
            $instance->dx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DxProvider::class, 'values')]
    public function testSetDxAttributeValue(
        float|int|string|null $dx,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDx;
        };

        $instance = $instance->attributes($attributes)->dx($dx);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::DX, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
