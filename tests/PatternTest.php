<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language, Role};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\Pattern;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, PreserveAspectRatio, SvgAttribute};

/**
 * Test suite for {@see Pattern} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<pattern>` element according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `Pattern` tag rendering, supporting all global HTML
 * attributes, content, and pattern-specific attributes.
 *
 * Test coverage.
 * - Accurate rendering of the `<pattern>` element with inline content.
 * - Correct application of pattern-specific attributes like `patternUnits`, `patternContentUnits`, and
 *   `patternTransform`.
 * - Correct application of geometry and viewport attributes like `x`, `y`, `width`, `height`, `viewBox`,
 *   `preserveAspectRatio`, and `href`.
 * - Error handling for invalid attribute values.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 * - Integration with configuration providers and global factory defaults.
 * - Nested rendering structure using `begin()` and `end()` methods.
 * - Precedence of user-defined attributes over global defaults and provider settings.
 *
 * {@see Pattern} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class PatternTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern aria-pressed="true">
            value
            </pattern>
            HTML,
            Pattern::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern aria-pressed="true">
            value
            </pattern>
            HTML,
            Pattern::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern data-value="value">
            value
            </pattern>
            HTML,
            Pattern::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern data-value="value">
            value
            </pattern>
            HTML,
            Pattern::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </pattern>
            HTML,
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
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern class="value">
            value
            </pattern>
            HTML,
            Pattern::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern>
            Content
            </pattern>
            HTML,
            Pattern::tag()->begin() . 'Content' . Pattern::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern class="value">
            value
            </pattern>
            HTML,
            Pattern::tag()->class('value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern>
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern data-value="test-value">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern class="default-class">
            value
            </pattern>
            HTML,
            Pattern::tag(['class' => 'default-class'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern class="default-class">
            value
            </pattern>
            HTML,
            Pattern::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Pattern::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <pattern class="default-class">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Pattern::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern height="120%">
            value
            </pattern>
            HTML,
            Pattern::tag()->height('120%')->content('value')->render(),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithHref(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern href="#myPattern">
            value
            </pattern>
            HTML,
            Pattern::tag()->href('#myPattern')->content('value')->render(),
            "Failed asserting that element renders correctly with 'href' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern id="test-id">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern lang="es">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithPatternContentUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern patternContentUnits="userSpaceOnUse">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->patternContentUnits('userSpaceOnUse')->render(),
            "Failed asserting that element renders correctly with 'patternContentUnits' attribute.",
        );
    }

    public function testRenderWithPatternContentUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern patternContentUnits="objectBoundingBox">
            value
            </pattern>
            HTML,
            Pattern::tag()
                ->content('value')
                ->patternContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)
                ->render(),
            "Failed asserting that element renders correctly with 'patternContentUnits' attribute using enum.",
        );
    }

    public function testRenderWithPatternTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern patternTransform="rotate(90)">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->patternTransform('rotate(90)')->render(),
            "Failed asserting that element renders correctly with 'patternTransform' attribute.",
        );
    }

    public function testRenderWithPatternUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern patternUnits="objectBoundingBox">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->patternUnits('objectBoundingBox')->render(),
            "Failed asserting that element renders correctly with 'patternUnits' attribute.",
        );
    }

    public function testRenderWithPatternUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern patternUnits="userSpaceOnUse">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->patternUnits(CoordinateUnits::USER_SPACE_ON_USE)->render(),
            "Failed asserting that element renders correctly with 'patternUnits' attribute using enum.",
        );
    }

    public function testRenderWithPreserveAspectRatio(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern preserveAspectRatio="xMidYMid meet">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->preserveAspectRatio('xMidYMid meet')->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatioUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern preserveAspectRatio="xMinYMin slice">
            value
            </pattern>
            HTML,
            Pattern::tag()
                ->content('value')
                ->preserveAspectRatio(PreserveAspectRatio::X_MIN_Y_MIN_SLICE)
                ->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute using enum.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern role="banner">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern role="banner">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern style='test-value'>
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern tabindex="3">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern>
            value
            </pattern>
            HTML,
            (string) Pattern::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Pattern::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <pattern class="from-global" id="id-user">
            value
            </pattern>
            HTML,
            Pattern::tag(['id' => 'id-user'])->content('value')->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Pattern::class, []);
    }

    public function testRenderWithViewBox(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern viewBox="0 0 100 100">
            value
            </pattern>
            HTML,
            Pattern::tag()->content('value')->viewBox('0 0 100 100')->render(),
            "Failed asserting that element renders correctly with 'viewBox' attribute.",
        );
    }

    public function testRenderWithWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern width="120%">
            value
            </pattern>
            HTML,
            Pattern::tag()->width('120%')->content('value')->render(),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern x="-10%">
            value
            </pattern>
            HTML,
            Pattern::tag()->x('-10%')->content('value')->render(),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <pattern y="-10%">
            value
            </pattern>
            HTML,
            Pattern::tag()->y('-10%')->content('value')->render(),
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
