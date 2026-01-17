<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasX1;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\X1Provider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasX1} trait managing the `x1` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `x1` attribute is not provided.
 * - Sets the `x1` SVG attribute and renders the expected output.
 *
 * {@see X1Provider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasX1Test extends TestCase
{
    public function testReturnEmptyWhenX1AttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX1;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingX1Attribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasX1;
        };

        self::assertNotSame(
            $instance,
            $instance->x1(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(X1Provider::class, 'values')]
    public function testSetX1AttributeValue(
        float|int|string|null $x1,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasX1;
        };

        $instance = $instance->attributes($attributes)->x1($x1);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::X1, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
