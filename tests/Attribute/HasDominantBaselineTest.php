<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Attribute;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Mixin\HasAttributes;
use UIAwesome\Html\Svg\Attribute\HasDominantBaseline;
use UIAwesome\Html\Svg\Tests\Support\Provider\Attribute\DominantBaselineProvider;
use UIAwesome\Html\Svg\Values\{DominantBaseline, SvgAttribute};
use UnitEnum;

/**
 * Unit test for the {@see HasDominantBaseline} trait managing the `dominant-baseline` SVG attribute.
 *
 * Validates correct rendering, immutability, and attribute override behavior.
 *
 * {@see DominantBaselineProvider} for test case data providers.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('attribute')]
final class HasDominantBaselineTest extends TestCase
{
    public function testReturnEmptyWhenDominantBaselineAttributeNotSet(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDominantBaseline;
        };

        self::assertEmpty(
            $instance->getAttributes(),
            'Should have no attributes set when no attribute is provided.',
        );
    }

    public function testReturnNewInstanceWhenSettingDominantBaselineAttribute(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDominantBaseline;
        };

        self::assertNotSame(
            $instance,
            $instance->dominantBaseline(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    /**
     * @phpstan-param mixed[] $attributes
     */
    #[DataProviderExternal(DominantBaselineProvider::class, 'values')]
    public function testSetDominantBaselineAttributeValue(
        string|UnitEnum|null $dominantBaseline,
        array $attributes,
        string|UnitEnum $expectedValue,
        string $expectedRenderAttribute,
        string $message,
    ): void {
        $instance = new class {
            use HasAttributes;
            use HasDominantBaseline;
        };

        $instance = $instance->attributes($attributes)->dominantBaseline($dominantBaseline);

        self::assertSame(
            $expectedValue,
            $instance->getAttribute(SvgAttribute::DOMINANT_BASELINE, ''),
            $message,
        );
        self::assertSame(
            $expectedRenderAttribute,
            Attributes::render($instance->getAttributes()),
            $message,
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidDominantBaseline(): void
    {
        $instance = new class {
            use HasAttributes;
            use HasDominantBaseline;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::DOMINANT_BASELINE->value,
                implode("', '", Enum::normalizeArray(DominantBaseline::cases())),
            ),
        );

        $instance->dominantBaseline('invalid-value');
    }
}
