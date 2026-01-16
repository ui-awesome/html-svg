<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasCy;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\CyProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasCy} trait managing the `cy` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 *
 * {@see CyProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasCyTest extends TestCase
{
    public function testReturnEmptyWhenCyAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCy;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingCyAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasCy;
        };

        self::assertNotSame(
            $instance,
            $instance->cy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(CyProvider::class, 'values')]
    public function testSetCyAttributeValue(
        float|int|string|null $cy,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasCy;
        };

        $instance = $instance->attributes($attributes)->cy($cy);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::CY, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
