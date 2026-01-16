<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasRy;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RyProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasRy} trait managing the `ry` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see RyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRyTest extends TestCase
{
    public function testReturnEmptyWhenRyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRy;
        };

        self::assertNotSame(
            $instance,
            $instance->ry(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RyProvider::class, 'values')]
    public function testSetRyAttributeValue(
        float|int|string|null $ry,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRy;
        };

        $instance = $instance->attributes($attributes)->ry($ry);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::RY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
