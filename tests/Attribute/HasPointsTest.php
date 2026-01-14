<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasPoints;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\PointsProvider;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Test suite for {@see HasPoints} trait functionality and behavior.
 *
 * Validates the management of the SVG `points` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and rendering of the `points` attribute in tag rendering, supporting
 * appropriate types and `null` for dynamic points assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `points` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `points` attribute.
 * - Proper assignment and overriding of `points` value.
 *
 * {@see PointsProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasPointsTest extends TestCase
{
    public function testReturnEmptyWhenPointsAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPoints;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingPointsAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasPoints;
        };

        self::assertNotSame(
            $instance,
            $instance->points(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(PointsProvider::class, 'values')]
    public function testSetPointsAttributeValue(
        string|null $points,
        array $attributes,
        string $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasPoints;
        };

        $instance = $instance->attributes($attributes)->points($points);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::POINTS, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }
}
