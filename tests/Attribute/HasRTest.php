<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasR;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasR} trait managing the `r` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see RProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRTest extends TestCase
{
    public function testReturnEmptyWhenRAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasR;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasR;
        };

        self::assertNotSame(
            $instance,
            $instance->r(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RProvider::class, 'values')]
    public function testSetRAttributeValue(
        float|int|string|null $r,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasR;
        };

        $instance = $instance->attributes($attributes)->r($r);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::R, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
