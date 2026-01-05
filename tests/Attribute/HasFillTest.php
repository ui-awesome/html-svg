<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasFill;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FillProvider;

/**
 * Test suite for {@see HasFill} trait functionality and behavior.
 *
 * Validates the management of the SVG `fill` attribute according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `fill` attribute in tag rendering, supporting string
 * and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with the `fill` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of the trait's API when setting or overriding the `fill` attribute.
 * - Proper assignment and overriding of `fill` value.
 *
 * {@see FillProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFillTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FillProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithFillAttribute(
        string|null $fill,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFill;
        };

        $instance = $instance->attributes($attributes)->fill($fill);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

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
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFill;
        };

        $instance = $instance->attributes($attributes)->fill($fill);

        self::assertSame(
            $expected,
            $instance->getAttributes()['fill'] ?? '',
            $message,
        );
    }
}
