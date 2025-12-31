<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Mixin\HasAttributes;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Svg\Attribute\HasFillRule;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\FillRuleProvider;
use UnitEnum;

/**
 * Test suite for {@see HasFillRule} trait functionality and behavior.
 *
 * Validates management of SVG `fill-rule` attribute according to SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of `fill-rule` attribute in tag rendering, supporting string,
 * UnitEnum, and `null` for dynamic identifier assignment.
 *
 * Test coverage.
 * - Accurate rendering of attributes with `fill-rule` attribute.
 * - Data provider-driven validation for edge cases and expected behaviors.
 * - Immutability of trait's API when setting or overriding `fill-rule` attribute.
 * - Proper assignment and overriding of `fill-rule` value.
 *
 * {@see FillRuleProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasFillRuleTest extends TestCase
{
    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FillRuleProvider::class, 'renderAttribute')]
    public function testRenderAttributesWithFillRuleAttribute(
        string|UnitEnum|null $fillRule,
        array $attributes,
        string $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFillRule;
        };

        $instance = $instance->attributes($attributes)->fillRule($fillRule);

        self::assertSame(
            $expected,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testReturnEmptyWhenFillRuleAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillRule;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingFillRuleAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasFillRule;
        };

        self::assertNotSame(
            $instance,
            $instance->fillRule(''),
            'Should return a new instance when setting attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(FillRuleProvider::class, 'values')]
    public function testSetFillRuleAttributeValue(
        string|UnitEnum|null $fillRule,
        array $attributes,
        string|UnitEnum|null $expected,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasFillRule;
        };

        $instance = $instance->attributes($attributes)->fillRule($fillRule);

        self::assertSame(
            $expected,
            $instance->getAttributes()['fill-rule'] ?? '',
            $message,
        );
    }
}
