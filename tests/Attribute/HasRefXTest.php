<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasRefX;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RefXProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasRefX} trait managing the `refX` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see RefXProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRefXTest extends TestCase
{
    public function testReturnEmptyWhenRefXAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRefX;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRefXAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRefX;
        };

        self::assertNotSame(
            $instance,
            $instance->refX(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RefXProvider::class, 'values')]
    public function testSetRefXAttributeValue(
        float|int|string|null $refX,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRefX;
        };

        $instance = $instance->attributes($attributes)->refX($refX);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::REF_X, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
