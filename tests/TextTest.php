<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Text;
use UIAwesome\Html\Svg\Values\{
    DominantBaseline,
    FontStyle,
    LengthAdjust,
    SvgAttribute,
    TextAnchor,
    TextDecorationLine,
    TextDecorationStyle,
    WritingMode
};

/**
 * Unit tests for {@see Text} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see Text::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<text>` with inline content.
 * - Renders `<text>` with representative positioning and typography attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see Text} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class TextTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text aria-pressed="true">
            value
            </text>
            HTML,
            Text::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text aria-pressed="true">
            value
            </text>
            HTML,
            Text::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text data-value="value">
            value
            </text>
            HTML,
            Text::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text data-value="value">
            value
            </text>
            HTML,
            Text::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </text>
            HTML,
            Text::tag()
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
            <text class="value">
            value
            </text>
            HTML,
            Text::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text>
            Content
            </text>
            HTML,
            Text::tag()->begin() . 'Content' . Text::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertSame(
            <<<HTML
            <text class="text-class">
            </text>
            HTML,
            Text::tag()->class('text-class')->render(),
        );
    }

    public function testRenderWithContent(): void
    {
        self::assertSame(
            <<<HTML
            <text>
            Hello SVG
            </text>
            HTML,
            Text::tag()->content('Hello SVG')->render(),
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text data-value="test-value">
            value
            </text>
            HTML,
            Text::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text class="default-class">
            value
            </text>
            HTML,
            Text::tag(['class' => 'default-class'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text class="default-class" title="default-title">
            value
            </text>
            HTML,
            Text::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithDominantBaseline(): void
    {
        self::assertSame(
            <<<HTML
            <text dominant-baseline="middle">
            </text>
            HTML,
            Text::tag()->dominantBaseline('middle')->render(),
        );
    }

    public function testRenderWithDominantBaselineUsingEnum(): void
    {
        self::assertSame(
            <<<HTML
            <text dominant-baseline="hanging">
            </text>
            HTML,
            Text::tag()->dominantBaseline(DominantBaseline::HANGING)->render(),
        );
    }

    public function testRenderWithDx(): void
    {
        self::assertSame(
            <<<HTML
            <text dx="5">
            </text>
            HTML,
            Text::tag()->dx('5')->render(),
        );
    }

    public function testRenderWithDy(): void
    {
        self::assertSame(
            <<<HTML
            <text dy="10">
            </text>
            HTML,
            Text::tag()->dy('10')->render(),
        );
    }

    public function testRenderWithFill(): void
    {
        self::assertSame(
            <<<HTML
            <text fill="blue">
            </text>
            HTML,
            Text::tag()->fill('blue')->render(),
        );
    }

    public function testRenderWithFontFamily(): void
    {
        self::assertSame(
            <<<HTML
            <text font-family="Arial">
            </text>
            HTML,
            Text::tag()->fontFamily('Arial')->render(),
        );
    }

    public function testRenderWithFontSize(): void
    {
        self::assertSame(
            <<<HTML
            <text font-size="16">
            </text>
            HTML,
            Text::tag()->fontSize('16')->render(),
        );
    }

    public function testRenderWithFontStyle(): void
    {
        self::assertSame(
            <<<HTML
            <text font-style="italic">
            </text>
            HTML,
            Text::tag()->fontStyle('italic')->render(),
        );
    }

    public function testRenderWithFontStyleUsingEnum(): void
    {
        self::assertSame(
            <<<HTML
            <text font-style="oblique">
            </text>
            HTML,
            Text::tag()->fontStyle(FontStyle::OBLIQUE)->render(),
        );
    }

    public function testRenderWithFontWeight(): void
    {
        self::assertSame(
            <<<HTML
            <text font-weight="bold">
            </text>
            HTML,
            Text::tag()->fontWeight('bold')->render(),
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Text::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <text class="default-class">
            value
            </text>
            HTML,
            Text::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Text::class, []);
    }

    public function testRenderWithId(): void
    {
        self::assertSame(
            <<<HTML
            <text id="text-id">
            </text>
            HTML,
            Text::tag()->id('text-id')->render(),
        );
    }

    public function testRenderWithLang(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text lang="es">
            value
            </text>
            HTML,
            Text::tag()->content('value')->lang('es')->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text lang="es">
            value
            </text>
            HTML,
            Text::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithLengthAdjust(): void
    {
        self::assertSame(
            <<<HTML
            <text lengthAdjust="spacing">
            </text>
            HTML,
            Text::tag()->lengthAdjust('spacing')->render(),
        );
    }

    public function testRenderWithLengthAdjustUsingEnum(): void
    {
        self::assertSame(
            <<<HTML
            <text lengthAdjust="spacingAndGlyphs">
            </text>
            HTML,
            Text::tag()->lengthAdjust(LengthAdjust::SPACING_AND_GLYPHS)->render(),
        );
    }

    public function testRenderWithLetterSpacing(): void
    {
        self::assertSame(
            <<<HTML
            <text letter-spacing="2">
            </text>
            HTML,
            Text::tag()->letterSpacing('2')->render(),
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::assertSame(
            <<<HTML
            <text opacity="0.5">
            </text>
            HTML,
            Text::tag()->opacity('0.5')->render(),
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertSame(
            <<<HTML
            <text role="banner">
            </text>
            HTML,
            Text::tag()->role('banner')->render(),
        );
    }

    public function testRenderWithRotate(): void
    {
        self::assertSame(
            <<<HTML
            <text rotate="45">
            </text>
            HTML,
            Text::tag()->rotate('45')->render(),
        );
    }

    public function testRenderWithStroke(): void
    {
        self::assertSame(
            <<<HTML
            <text stroke="red">
            </text>
            HTML,
            Text::tag()->stroke('red')->render(),
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertSame(
            <<<HTML
            <text style='color: red;'>
            </text>
            HTML,
            Text::tag()->style('color: red;')->render(),
        );
    }

    public function testRenderWithTabIndex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <text tabindex="3">
            value
            </text>
            HTML,
            Text::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithTextAnchor(): void
    {
        self::assertSame(
            <<<HTML
            <text text-anchor="middle">
            </text>
            HTML,
            Text::tag()->textAnchor('middle')->render(),
        );
    }

    public function testRenderWithTextAnchorUsingEnum(): void
    {
        self::assertSame(
            <<<HTML
            <text text-anchor="end">
            </text>
            HTML,
            Text::tag()->textAnchor(TextAnchor::END)->render(),
        );
    }

    public function testRenderWithTextDecoration(): void
    {
        self::assertSame(
            <<<HTML
            <text text-decoration="underline">
            </text>
            HTML,
            Text::tag()->textDecoration('underline')->render(),
        );
    }

    public function testRenderWithTextDecorationUsingEnum(): void
    {
        self::assertSame(
            <<<HTML
            <text text-decoration="line-through">
            </text>
            HTML,
            Text::tag()->textDecoration(TextDecorationLine::LINE_THROUGH)->render(),
        );
        self::assertSame(
            <<<HTML
            <text text-decoration="dashed">
            </text>
            HTML,
            Text::tag()->textDecoration(TextDecorationStyle::DASHED)->render(),
        );
    }

    public function testRenderWithTextLength(): void
    {
        self::assertSame(
            <<<HTML
            <text textLength="200">
            </text>
            HTML,
            Text::tag()->textLength('200')->render(),
        );
    }

    public function testRenderWithTitle(): void
    {
        self::assertSame(
            <<<HTML
            <text title="SVG Text">
            </text>
            HTML,
            Text::tag()->title('SVG Text')->render(),
        );
    }

    public function testRenderWithTransform(): void
    {
        self::assertSame(
            <<<HTML
            <text transform="rotate(45)">
            </text>
            HTML,
            Text::tag()->transform('rotate(45)')->render(),
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Text::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <text class="from-global" id="id-user">
            </text>
            HTML,
            Text::tag(['id' => 'id-user'])->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Text::class, []);
    }

    public function testRenderWithWordSpacing(): void
    {
        self::assertSame(
            <<<HTML
            <text word-spacing="5">
            </text>
            HTML,
            Text::tag()->wordSpacing('5')->render(),
        );
    }

    public function testRenderWithWritingMode(): void
    {
        self::assertSame(
            <<<HTML
            <text writing-mode="vertical-rl">
            </text>
            HTML,
            Text::tag()->writingMode('vertical-rl')->render(),
        );
    }

    public function testRenderWithWritingModeUsingEnum(): void
    {
        self::assertSame(
            <<<HTML
            <text writing-mode="horizontal-tb">
            </text>
            HTML,
            Text::tag()->writingMode(WritingMode::HORIZONTAL_TB)->render(),
        );
    }

    public function testRenderWithX(): void
    {
        self::assertSame(
            <<<HTML
            <text x="100">
            </text>
            HTML,
            Text::tag()->x('100')->render(),
        );
    }

    public function testRenderWithY(): void
    {
        self::assertSame(
            <<<HTML
            <text y="50">
            </text>
            HTML,
            Text::tag()->y('50')->render(),
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $text = Text::tag();

        self::assertNotSame(
            $text,
            $text->dominantBaseline(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->dx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->dy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->fontFamily(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->fontSize(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->fontStyle(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->fontWeight(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->lengthAdjust(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->letterSpacing(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->rotate(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->textAnchor(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->textDecoration(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->textLength(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->wordSpacing(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->writingMode(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForDominantBaseline(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid',
                SvgAttribute::DOMINANT_BASELINE->value,
                implode("', '", Enum::normalizeArray(DominantBaseline::cases())),
            ),
        );

        Text::tag()->dominantBaseline('invalid')->render();
    }

    public function testThrowInvalidArgumentExceptionForFontStyle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid',
                SvgAttribute::FONT_STYLE->value,
                implode("', '", Enum::normalizeArray(FontStyle::cases())),
            ),
        );

        Text::tag()->fontStyle('invalid')->render();
    }

    public function testThrowInvalidArgumentExceptionForLengthAdjust(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid',
                SvgAttribute::LENGTH_ADJUST->value,
                implode("', '", Enum::normalizeArray(LengthAdjust::cases())),
            ),
        );

        Text::tag()->lengthAdjust('invalid')->render();
    }

    public function testThrowInvalidArgumentExceptionForTextAnchor(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid',
                SvgAttribute::TEXT_ANCHOR->value,
                implode("', '", Enum::normalizeArray(TextAnchor::cases())),
            ),
        );

        Text::tag()->textAnchor('invalid')->render();
    }

    public function testThrowInvalidArgumentExceptionForWritingMode(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid',
                SvgAttribute::WRITING_MODE->value,
                implode("', '", Enum::normalizeArray(WritingMode::cases())),
            ),
        );

        Text::tag()->writingMode('invalid')->render();
    }
}
