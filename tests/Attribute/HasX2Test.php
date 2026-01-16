<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasX2;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\X2Provider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit test for the {@see HasX2} trait managing the `x2` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see X2Provider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasX2Test extends TestCase
{
    public function testReturnEmptyWhenX2AttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX2;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingX2Attribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX2;
        };

        self::assertNotSame(
            $instance,
            $instance->x2(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(X2Provider::class, 'values')]
    public function testSetX2AttributeValue(
        float|int|string|null $x2,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasX2;
        };

        $instance = $instance->attributes($attributes)->x2($x2);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::X2, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
