<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasRotate;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RotateProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Unit tests for the {@see HasRotate} trait managing the `rotate` SVG attribute.
 *
 * Verifies rendered output, immutability, and attribute override behavior.
 *
 * Test coverage.
 * - Ensures fluent setters return new instances (immutability).
 * - Ensures no attributes are set when the `rotate` attribute is not provided.
 * - Sets the `rotate` SVG attribute and renders the expected output.
 *
 * {@see RotateProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRotateTest extends TestCase
{
    public function testReturnEmptyWhenRotateAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRotate;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRotateAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasRotate;
        };

        self::assertNotSame(
            $instance,
            $instance->rotate(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RotateProvider::class, 'values')]
    public function testSetRotateAttributeValue(
        float|int|string|null $rotate,
        array $attributes,
        float|int|string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasRotate;
        };

        $instance = $instance->attributes($attributes)->rotate($rotate);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::ROTATE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
