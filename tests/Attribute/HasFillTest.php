<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFill;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FillProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasFill} trait managing the `fill` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see FillProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFillTest extends TestCase
{
    public function testReturnEmptyWhenFillAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFill;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFillAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFill;
        };

        self::assertNotSame(
            $instance,
            $instance->fill(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FillProvider::class, 'values')]
    public function testSetFillAttributeValue(
        string|null $fill,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFill;
        };

        $instance = $instance->attributes($attributes)->fill($fill);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::FILL, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
