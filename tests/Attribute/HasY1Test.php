<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasY1;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\Y1Provider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasY1} trait managing the `y1` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `y1` attribute is not provided.
 * - Sets the `y1` SVG attribute and renders the expected output.
 *
 * {@see Y1Provider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasY1Test extends TestCase
{
    public function testReturnEmptyWhenY1AttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasY1;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingY1Attribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasY1;
        };

        self::assertNotSame(
            $instance,
            $instance->y1(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(Y1Provider::class, 'values')]
    public function testSetY1AttributeValue(
        float|int|string|null $y1,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasY1;
        };

        $instance = $instance->attributes($attributes)->y1($y1);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::Y1, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
