<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasStrokeDashArray;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\StrokeDashArrayProvider;

/**
 * Test suite for {@see HasStrokeDashArray} trait functionality and behavior.
 *
 * Validates the management of the SVG `stroke-dasharray` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `stroke-dasharray` attribute in tag rendering,
 * supporting int, string and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `stroke-dasharray` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `stroke-dasharray` attribute.
 * - Proper assignment and overriding of `stroke-dasharray` value.
 *
 * {@see StrokeDashArrayProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasStrokeDashArrayTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeDashArrayProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithStrokeDashArrayAttribute(
        float|int|string|null $strokeDashArray,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeDashArray;
        };

        $instance = $instance->attributes($attributes)->strokeDashArray($strokeDashArray);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenStrokeDashArrayAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeDashArray;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingStrokeDashArrayAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasStrokeDashArray;
        };

        self::assertNotSame(
            $instance,
            $instance->strokeDashArray(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(StrokeDashArrayProvider::class, 'values')]
    public function testSetStrokeDashArrayAttributeValue(
        float|int|string|null $strokeDashArray,
        array $attributes,
        float|int|string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasStrokeDashArray;
        };

        $instance = $instance->attributes($attributes)->strokeDashArray($strokeDashArray);

        self::assertSame(
            $expected,
            $instance->getAttributes()['stroke-dasharray'] ?? '',
            $message,
        );
    }
}
