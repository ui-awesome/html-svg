<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasY2;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\Y2Provider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasY2} trait managing the `y2` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `y2` attribute is not provided.
 * - Sets the `y2` SVG attribute and renders the expected output.
 *
 * {@see Y2Provider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasY2Test extends TestCase
{
    public function testReturnEmptyWhenY2AttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasY2;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingY2Attribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasY2;
        };

        self::assertNotSame(
            $instance,
            $instance->y2(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(Y2Provider::class, 'values')]
    public function testSetY2AttributeValue(
        float|int|string|null $y2,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasY2;
        };

        $instance = $instance->attributes($attributes)->y2($y2);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::Y2, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
