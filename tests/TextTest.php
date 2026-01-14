<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
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
 * Test suite for {@see Text} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<text>` element according to the SVG 2 and HTML specifications.
 *
 * Ensures correct handling, immutability, and validation of the `Text` tag rendering, supporting text positioning,
 * typography, alignment, and writing mode attributes.
 *
 * Test coverage.
 * - Accurate rendering of the `<text>` element with content and global/specific attributes.
 * - Correct application of typography attributes like `font-family`, `font-size`, `font-weight`, and `font-style`.
 * - Error handling for invalid attribute values.
 * - Handling of text alignment and spacing via `text-anchor`, `dominant-baseline`, `letter-spacing`, and
 *   `word-spacing`.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 * - Validation of positioning attributes such as `x`, `y`, `dx`, `dy`, and `rotate`.
 *
 * {@see Text} for element implementation details.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class TextTest extends TestCase
{
    use TestSupport;

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

    public function testRenderWithMultipleAttributes(): void
    {
        self::assertSame(
            <<<HTML
            <text fill="red" font-family="Arial" font-size="16" text-anchor="middle" x="100" y="50">
            Hello
            </text>
            HTML,
            Text::tag()
                ->content('Hello')
                ->fill('red')
                ->fontFamily('Arial')
                ->fontSize('16')
                ->textAnchor('middle')
                ->x('100')
                ->y('50')
                ->render(),
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

    public function testRenderWithTextDecorationMultipleValues(): void
    {
        self::assertSame(
            <<<HTML
            <text text-decoration="underline overline">
            </text>
            HTML,
            Text::tag()->textDecoration('underline overline')->render(),
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
            $text->dx('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->dy('0'),
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
            $text->textLength('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->wordSpacing('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->writingMode(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->x('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $text,
            $text->y('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForInvalidDominantBaseline(): void
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

    public function testThrowInvalidArgumentExceptionForInvalidFontStyle(): void
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

    public function testThrowInvalidArgumentExceptionForInvalidLengthAdjust(): void
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

    public function testThrowInvalidArgumentExceptionForInvalidTextAnchor(): void
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

    public function testThrowInvalidArgumentExceptionForInvalidWritingMode(): void
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
