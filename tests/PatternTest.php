<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPForge\Support\LineEndingNormalizer;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language, Role};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\Pattern;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, PreserveAspectRatio, SvgAttribute};

/**
 * Unit tests for {@see Pattern} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see Pattern::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<pattern>` with inline content.
 * - Renders `<pattern>` with representative pattern and viewport attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see Pattern} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class PatternTest extends TestCase
{
    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern aria-pressed="true">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern aria-pressed="true">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern data-value="value">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern data-value="value">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()
                                ->ariaAttributes(
                                    [
                                        'controls' => static fn(): string => 'modal-1',
                                        'hidden' => false,
                                        'label' => 'Close',
                                    ],
                                )
                                ->content('value')
                                ->render(),
            ),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern class="value">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->attributes(['class' => 'value'])->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern>
            Content
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->begin() . 'Content' . Pattern::end(),
            ),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern class="value">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->class('value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern>
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->render(),
            ),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern data-value="test-value">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern class="default-class">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag(['class' => 'default-class'])->content('value')->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern class="default-class">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Pattern::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <pattern class="default-class">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Pattern::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern height="120%">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->height('120%')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithHref(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern href="#myPattern">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->href('#myPattern')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'href' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern id="test-id">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->id('test-id')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern lang="es">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->lang(Language::SPANISH)->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithPatternContentUnits(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern patternContentUnits="userSpaceOnUse">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->patternContentUnits('userSpaceOnUse')->render(),
            ),
            "Failed asserting that element renders correctly with 'patternContentUnits' attribute.",
        );
    }

    public function testRenderWithPatternContentUnitsUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern patternContentUnits="objectBoundingBox">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()
                                ->content('value')
                                ->patternContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)
                                ->render(),
            ),
            "Failed asserting that element renders correctly with 'patternContentUnits' attribute using enum.",
        );
    }

    public function testRenderWithPatternTransform(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern patternTransform="rotate(90)">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->patternTransform('rotate(90)')->render(),
            ),
            "Failed asserting that element renders correctly with 'patternTransform' attribute.",
        );
    }

    public function testRenderWithPatternUnits(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern patternUnits="objectBoundingBox">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->patternUnits('objectBoundingBox')->render(),
            ),
            "Failed asserting that element renders correctly with 'patternUnits' attribute.",
        );
    }

    public function testRenderWithPatternUnitsUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern patternUnits="userSpaceOnUse">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->patternUnits(CoordinateUnits::USER_SPACE_ON_USE)->render(),
            ),
            "Failed asserting that element renders correctly with 'patternUnits' attribute using enum.",
        );
    }

    public function testRenderWithPreserveAspectRatio(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern preserveAspectRatio="xMidYMid meet">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->preserveAspectRatio('xMidYMid meet')->render(),
            ),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatioUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern preserveAspectRatio="xMinYMin slice">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()
                                ->content('value')
                                ->preserveAspectRatio(PreserveAspectRatio::X_MIN_Y_MIN_SLICE)
                                ->render(),
            ),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute using enum.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern role="banner">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->role('banner')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern role="banner">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->role(Role::BANNER)->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern style='test-value'>
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->style('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern tabindex="3">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->tabIndex(3)->render(),
            ),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern>
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                (string) Pattern::tag()->content('value'),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Pattern::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <pattern class="from-global" id="id-user">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag(['id' => 'id-user'])->content('value')->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Pattern::class, []);
    }

    public function testRenderWithViewBox(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern viewBox="0 0 100 100">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->content('value')->viewBox('0 0 100 100')->render(),
            ),
            "Failed asserting that element renders correctly with 'viewBox' attribute.",
        );
    }

    public function testRenderWithWidth(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern width="120%">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->width('120%')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern x="-10%">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->x('-10%')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::assertEquals(
            <<<HTML
            <pattern y="-10%">
            value
            </pattern>
            HTML,
            LineEndingNormalizer::normalize(
                Pattern::tag()->y('-10%')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $pattern = Pattern::tag();

        self::assertNotSame(
            $pattern,
            $pattern->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->href(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->patternContentUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->patternTransform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->patternUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->preserveAspectRatio(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->viewBox(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $pattern,
            $pattern->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingPatternContentUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::PATTERN_CONTENT_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        Pattern::tag()->patternContentUnits('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingPatternUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::PATTERN_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        Pattern::tag()->patternUnits('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingPreserveAspectRatioValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::PRESERVE_ASPECT_RATIO->value,
                implode("', '", Enum::normalizeArray(PreserveAspectRatio::cases())),
            ),
        );

        Pattern::tag()->preserveAspectRatio('invalid-value');
    }
}
