<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasFr;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FrProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasFr} trait managing the `fr` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `fr` attribute is not provided.
 * - Sets the `fr` SVG attribute and renders the expected output.
 *
 * {@see FrProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFrTest extends TestCase
{
    public function testReturnEmptyWhenFrAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFr;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFrAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFr;
        };

        self::assertNotSame(
            $instance,
            $instance->fr(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FrProvider::class, 'values')]
    public function testSetFrAttributeValue(
        float|int|string|null $fr,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFr;
        };

        $instance = $instance->attributes($attributes)->fr($fr);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::FR, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
