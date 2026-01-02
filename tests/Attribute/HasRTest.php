<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasR;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\RProvider;

/**
 * Test suite for {@see HasR} trait functionality and behavior.
 *
 * Validates the management of the SVG `r` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `r` attribute in tag rendering, supporting int, float,
 * string and `null` for dynamic radius assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `r` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `r` attribute.
 * - Proper assignment and overriding of `r` value.
 *
 * {@see RProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasRTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithRAttribute(
        float|int|string|null $r,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasR;
        };

        $instance = $instance->attributes($attributes)->r($r);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenRAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasR;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingRAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasR;
        };

        self::assertNotSame(
            $instance,
            $instance->r(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(RProvider::class, 'values')]
    public function testSetRAttributeValue(
        float|int|string|null $r,
        array $attributes,
        float|int|string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasR;
        };

        $instance = $instance->attributes($attributes)->r($r);

        self::assertSame(
            $expected,
            $instance->getAttributes()['r'] ?? '',
            $message,
        );
    }
}
