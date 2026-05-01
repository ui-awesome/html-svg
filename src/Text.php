<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{
    DominantBaseline,
    FontStyle,
    LengthAdjust,
    SvgAttribute,
    TextAnchor,
    TextDecorationLine,
    TextDecorationStyle,
    WritingMode,
};
use UIAwesome\Html\Svg\Values\FillRule;
use UIAwesome\Html\Svg\Values\StrokeLineCap;
use UIAwesome\Html\Svg\Values\StrokeLineJoin;
use UnitEnum;

/**
 * Represents the SVG `<text>` (text) element for rendering text content in SVG graphics.
 *
 * Provides a concrete `<text>` element implementation that returns {@see SvgBlock::TEXT} and provides text layout,
 * typography, paint, and transform attribute methods.
 *
 * The `<text>` element defines text content with positioning, layout, and typography attributes.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports global `title` attribute.
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.) and transform attribute
 *   (`transform`).
 * - Supports text layout attributes (`textLength`, `lengthAdjust`, `text-anchor`, `dominant-baseline`).
 * - Supports text positioning attributes (`x`, `y`, `dx`, `dy`, `rotate`).
 * - Supports typography attributes (`font-family`, `font-size`, `font-weight`, `font-style`, `letter-spacing`,
 *   `word-spacing`, `text-decoration`, `writing-mode`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Text;
 *
 * echo Text::tag()
 *     ->x(12)
 *     ->y(24)
 *     ->fontSize(16)
 *     ->fill('currentColor')
 *     ->content('Hello SVG')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/text
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Text extends BaseSvgBlockTag
{
    /**
     * Sets SVG `dominant-baseline` attribute for the element.
     *
     * Creates a new instance with the specified dominant baseline value for the rendered element.
     *
     * @param DominantBaseline|string|null $value Dominant baseline value to set for the element. Accepts 'auto',
     * 'alphabetic', 'middle', 'central', 'hanging', 'mathematical', 'ideographic', 'text-top', 'text-bottom',
     * {@see DominantBaseline} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see DominantBaseline} enum or string.
     *
     * @return static New instance with the updated `dominant-baseline` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     * {@see DominantBaseline} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->dominantBaseline('middle');
     * $element->dominantBaseline(DominantBaseline::HANGING);
     * $element->dominantBaseline(null);
     * ```
     */
    public function dominantBaseline(DominantBaseline|string|null $value): static
    {
        Validator::oneOf($value, DominantBaseline::cases(), SvgAttribute::DOMINANT_BASELINE);

        return $this->addAttribute(SvgAttribute::DOMINANT_BASELINE, $value);
    }

    /**
     * Sets the SVG `dx` attribute for the element.
     *
     * Creates a new instance with the specified dx-offset value for the rendered element.
     *
     * @param float|int|string|null $value DX offset value (for example, '10', '5 10 15', or `null` to unset).
     *
     * @return static New instance with the updated `dx` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementDXAttribute
     *
     * Usage example:
     * ```php
     * $element->dx(10);
     * $element->dx('5 10 15');
     * $element->dx(null);
     * ```
     */
    public function dx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::DX, $value);
    }

    /**
     * Sets the SVG `dy` attribute for the element.
     *
     * Creates a new instance with the specified dy-offset value for the rendered element.
     *
     * @param float|int|string|null $value DY offset value (for example, '10', '5 10 15', or `null` to unset).
     *
     * @return static New instance with the updated `dy` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementDYAttribute
     *
     * Usage example:
     * ```php
     * $element->dy(10);
     * $element->dy('5 10 15');
     * $element->dy(null);
     * ```
     */
    public function dy(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::DY, $value);
    }

    /**
     * Sets the SVG `fill` attribute for the element.
     *
     * Creates a new instance with the specified fill value for the rendered element.
     *
     * @param string|null $value Fill value (for example, 'red', 'url(#gradient1)', or `null` to unset).
     *
     * @return static New instance with the updated `fill` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillProperties
     *
     * Usage example:
     * ```php
     * $element->fill('red');
     * $element->fill('url(#gradient1)');
     * $element->fill(null);
     * ```
     */
    public function fill(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FILL, $value);
    }

    /**
     * Sets SVG `fill-opacity` attribute for the element.
     *
     * Creates a new instance with the specified fill opacity value for the rendered element.
     *
     * @param float|int|string|null $value Fill opacity value (for example, '0.5' or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range ('0'-'1') and not `null`.
     *
     * @return static New instance with the updated `fill-opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillOpacity
     *
     * Usage example:
     * ```php
     * $element->fillOpacity('0.5');
     * $element->fillOpacity(null);
     * ```
     */
    public function fillOpacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::FILL_OPACITY, $value);
    }

    /**
     * Sets SVG `fill-rule` attribute for the element.
     *
     * Creates a new instance with the specified fill rule value for the rendered element.
     *
     * @param FillRule|string|null $value Fill rule value to set for the element. Accepts 'nonzero', 'evenodd',
     * {@see FillRule} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see FillRule} enum or string.
     *
     * @return static New instance with the updated `fill-rule` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#WindingRule
     * {@see FillRule} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->fillRule('nonzero');
     * $element->fillRule(FillRule::EVENODD);
     * $element->fillRule(null);
     * ```
     */
    public function fillRule(FillRule|string|null $value): static
    {
        Validator::oneOf($value, FillRule::cases(), SvgAttribute::FILL_RULE);

        return $this->addAttribute(SvgAttribute::FILL_RULE, $value);
    }

    /**
     * Sets the SVG `font-family` attribute for the element.
     *
     * Creates a new instance with the specified font family value for the rendered element.
     *
     * @param string|null $value Font family value (for example, 'Arial', 'Arial, sans-serif', or `null` to unset).
     *
     * @return static New instance with the updated `font-family` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-family-prop
     *
     * Usage example:
     * ```php
     * $element->fontFamily('Arial');
     * $element->fontFamily('Arial, Helvetica, sans-serif');
     * $element->fontFamily(null);
     * ```
     */
    public function fontFamily(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_FAMILY, $value);
    }

    /**
     * Sets the SVG `font-size` attribute for the element.
     *
     * Creates a new instance with the specified font size value for the rendered element.
     *
     * @param float|int|string|null $value Font size value (for example, '16', '1.2em', '120%', or `null` to unset).
     *
     * @return static New instance with the updated `font-size` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-size-prop
     *
     * Usage example:
     * ```php
     * $element->fontSize(16);
     * $element->fontSize('1.2em');
     * $element->fontSize(null);
     * ```
     */
    public function fontSize(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_SIZE, $value);
    }

    /**
     * Sets SVG `font-style` attribute for the element.
     *
     * Creates a new instance with the specified font style value for the rendered element.
     *
     * @param FontStyle|string|null $value Font style value to set for the element. Accepts 'normal', 'italic',
     * 'oblique', {@see FontStyle} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see FontStyle} enum or string.
     *
     * @return static New instance with the updated `font-style` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-style-prop
     * {@see FontStyle} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->fontStyle('italic');
     * $element->fontStyle(FontStyle::OBLIQUE);
     * $element->fontStyle(null);
     * ```
     */
    public function fontStyle(FontStyle|string|null $value): static
    {
        Validator::oneOf($value, FontStyle::cases(), SvgAttribute::FONT_STYLE);

        return $this->addAttribute(SvgAttribute::FONT_STYLE, $value);
    }

    /**
     * Sets the SVG `font-weight` attribute for the element.
     *
     * Creates a new instance with the specified font weight value for the rendered element.
     *
     * @param int|string|null $value Font weight value (for example, '700', 'bold', or `null` to unset).
     *
     * @return static New instance with the updated `font-weight` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-weight-prop
     *
     * Usage example:
     * ```php
     * $element->fontWeight(700);
     * $element->fontWeight('bold');
     * $element->fontWeight(null);
     * ```
     */
    public function fontWeight(int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_WEIGHT, $value);
    }

    /**
     * Sets SVG `lengthAdjust` attribute for the element.
     *
     * Creates a new instance with the specified length adjust value for the rendered element.
     *
     * @param LengthAdjust|string|null $value Length adjust value (for example, 'spacing', {@see LengthAdjust} enum,
     * or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see LengthAdjust} enum or string.
     *
     * @return static New instance with the updated `lengthAdjust` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     * {@see LengthAdjust} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->lengthAdjust('spacing');
     * $element->lengthAdjust(LengthAdjust::SPACING_AND_GLYPHS);
     * $element->lengthAdjust(null);
     * ```
     */
    public function lengthAdjust(LengthAdjust|string|null $value): static
    {
        Validator::oneOf($value, LengthAdjust::cases(), SvgAttribute::LENGTH_ADJUST);

        return $this->addAttribute(SvgAttribute::LENGTH_ADJUST, $value);
    }

    /**
     * Sets the SVG `letter-spacing` attribute for the element.
     *
     * Creates a new instance with the specified letter spacing value for the rendered element.
     *
     * @param float|int|string|null $value Letter spacing value (for example, '2', '0.1em', 'normal', or `null` to
     * unset).
     *
     * @return static New instance with the updated `letter-spacing` attribute.
     *
     * @link https://www.w3.org/TR/css-text-3/#letter-spacing-property
     *
     * Usage example:
     * ```php
     * $element->letterSpacing(2);
     * $element->letterSpacing('0.1em');
     * $element->letterSpacing(null);
     * ```
     */
    public function letterSpacing(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::LETTER_SPACING, $value);
    }

    /**
     * Sets the SVG `opacity` attribute for the element.
     *
     * Creates a new instance with the specified opacity value for the rendered element.
     *
     * @param float|int|string|null $value Opacity value (for example, '0.5' or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range ('0'-'1') and not `null`.
     *
     * @return static New instance with the updated `opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/render.html#ObjectAndGroupOpacityProperties
     *
     * Usage example:
     * ```php
     * $element->opacity(0.5);
     * $element->opacity('0.75');
     * $element->opacity(null);
     * ```
     */
    public function opacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::OPACITY, $value);
    }

    /**
     * Sets the SVG `rotate` attribute for the element.
     *
     * Creates a new instance with the specified rotation value for the rendered element.
     *
     * @param float|int|string|null $value Rotate value (for example, '45', '10 20 30 40', or `null` to unset).
     *
     * @return static New instance with the updated `rotate` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementRotateAttribute
     *
     * Usage example:
     * ```php
     * $element->rotate(45);
     * $element->rotate('10 20 30 40');
     * $element->rotate(null);
     * ```
     */
    public function rotate(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::ROTATE, $value);
    }

    /**
     * Sets the SVG `stroke` attribute for the element.
     *
     * Creates a new instance with the specified stroke value for the rendered element.
     *
     * @param string|null $value Stroke paint value (for example, 'black', 'url(#gradient1)', or `null` to unset).
     *
     * @return static New instance with the updated `stroke` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeProperty
     *
     * Usage example:
     * ```php
     * $element->stroke('black');
     * $element->stroke('url(#gradient1)');
     * $element->stroke(null);
     * ```
     */
    public function stroke(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE, $value);
    }

    /**
     * Sets the SVG `stroke-dasharray` attribute for the element.
     *
     * Creates a new instance with the specified dash array value for the rendered element.
     *
     * @param float|int|string|null $value Dash array value (for example, '5.3' or `null` to unset).
     *
     * @return static New instance with the updated `stroke-dasharray` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeDashing
     *
     * Usage example:
     * ```php
     * $element->strokeDashArray(5.3);
     * $element->strokeDashArray(4);
     * $element->strokeDashArray(null);
     * ```
     */
    public function strokeDashArray(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE_DASHARRAY, $value);
    }

    /**
     * Sets the SVG `stroke-linecap` attribute for the element.
     *
     * Creates a new instance with the specified stroke line cap value for the rendered element.
     *
     * @param string|StrokeLineCap|null $value Stroke line cap style (for example, 'round', {@see StrokeLineCap} enum,
     * or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see StrokeLineCap} enum or string.
     *
     * @return static New instance with the updated `stroke-linecap` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineCaps
     * {@see StrokeLineCap} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->strokeLineCap('round');
     * $element->strokeLineCap(StrokeLineCap::SQUARE);
     * $element->strokeLineCap(null);
     * ```
     */
    public function strokeLineCap(string|StrokeLineCap|null $value): static
    {
        Validator::oneOf($value, StrokeLineCap::cases(), SvgAttribute::STROKE_LINECAP);

        return $this->addAttribute(SvgAttribute::STROKE_LINECAP, $value);
    }

    /**
     * Sets the SVG `stroke-linejoin` attribute for the element.
     *
     * @param string|StrokeLineJoin|null $value Stroke line join style (for example, 'miter', {@see StrokeLineJoin}
     * enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see StrokeLineJoin} enum or string.
     *
     * @return static New instance with the updated `stroke-linejoin` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     * {@see StrokeLineJoin} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->strokeLineJoin('miter');
     * $element->strokeLineJoin(StrokeLineJoin::ROUND);
     * $element->strokeLineJoin(null);
     * ```
     */
    public function strokeLineJoin(string|StrokeLineJoin|null $value): static
    {
        Validator::oneOf($value, StrokeLineJoin::cases(), SvgAttribute::STROKE_LINEJOIN);

        return $this->addAttribute(SvgAttribute::STROKE_LINEJOIN, $value);
    }

    /**
     * Sets SVG `stroke-miterlimit` attribute for the element.
     *
     * Creates a new instance with the specified stroke miter limit value for the rendered element.
     *
     * The `stroke-miterlimit` attribute controls the limit on the ratio of the miter length to the stroke width. When
     * the limit is exceeded, the join is converted from a miter to a bevel. The value must be a number '>= 1'.
     *
     * @param float|int|string|null $value Stroke miter limit value (for example, '4' or `null` to unset).
     *
     * @throws InvalidArgumentException If value is not a number '>= 1' or `null`.
     *
     * @return static New instance with the updated `stroke-miterlimit` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeMiterlimitProperty
     *
     * Usage example:
     * ```php
     * $element->strokeMiterlimit(4);
     * $element->strokeMiterlimit(null);
     * ```
     */
    public function strokeMiterlimit(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
            );
        }

        return $this->addAttribute(SvgAttribute::STROKE_MITERLIMIT, $value);
    }

    /**
     * Sets SVG `stroke-opacity` attribute for the element.
     *
     * Creates a new instance with the specified stroke opacity value for the rendered element.
     *
     * @param float|int|string|null $value Stroke opacity value (for example, '0.8' or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range ('0'-'1') and not `null`.
     *
     * @return static New instance with the updated `stroke-opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeOpacityProperty
     *
     * Usage example:
     * ```php
     * $element->strokeOpacity(0.8);
     * $element->strokeOpacity('0.6');
     * $element->strokeOpacity(null);
     * ```
     */
    public function strokeOpacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::STROKE_OPACITY, $value);
    }

    /**
     * Sets the SVG `stroke-width` attribute for the element.
     *
     * Creates a new instance with the specified stroke width value for the rendered element.
     *
     * @param int|string|null $value Stroke width value (for example, '2', '1.5em', or `null` to unset).
     *
     * @return static New instance with the updated `stroke-width` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeWidth
     *
     * Usage example:
     * ```php
     * $element->strokeWidth(2);
     * $element->strokeWidth('1.5em');
     * $element->strokeWidth(null);
     * ```
     */
    public function strokeWidth(int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE_WIDTH, $value);
    }

    /**
     * Sets SVG `text-anchor` attribute for the element.
     *
     * Creates a new instance with the specified text anchor value for the rendered element.
     *
     * @param string|TextAnchor|null $value Text anchor value to set for the element. Accepts 'start', 'middle', 'end',
     * {@see TextAnchor} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see TextAnchor} enum or string.
     *
     * @return static New instance with the updated `text-anchor` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     * {@see TextAnchor} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->textAnchor('middle');
     * $element->textAnchor(TextAnchor::END);
     * $element->textAnchor(null);
     * ```
     */
    public function textAnchor(string|TextAnchor|null $value): static
    {
        Validator::oneOf($value, TextAnchor::cases(), SvgAttribute::TEXT_ANCHOR);

        return $this->addAttribute(SvgAttribute::TEXT_ANCHOR, $value);
    }

    /**
     * Sets the SVG `text-decoration` shorthand attribute for the text element.
     *
     * Creates a new instance with the specified text decoration value for the rendered element.
     *
     * @param string|TextDecorationLine|TextDecorationStyle|null $value Text decoration shorthand value (for example,
     * 'underline wavy red', {@see TextDecorationLine} enum, or `null` to unset).
     *
     * @return static New instance with the updated `text-decoration` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextDecorationProperties
     * {@see TextDecorationLine} for predefined line enum values.
     * {@see TextDecorationStyle} for predefined style enum values.
     *
     * Usage example:
     * ```php
     * $element->textDecoration('underline');
     * $element->textDecoration(TextDecorationLine::LINE_THROUGH);
     * $element->textDecoration(null);
     * ```
     */
    public function textDecoration(string|TextDecorationLine|TextDecorationStyle|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TEXT_DECORATION, $value);
    }

    /**
     * Sets the SVG `textLength` attribute for the element.
     *
     * Creates a new instance with the specified text length value for the rendered element.
     *
     * @param float|int|string|null $value Text length value (for example, '100', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `textLength` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementTextLengthAttribute
     *
     * Usage example:
     * ```php
     * $element->textLength(100);
     * $element->textLength('50%');
     * $element->textLength(null);
     * ```
     */
    public function textLength(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TEXT_LENGTH, $value);
    }

    /**
     * Sets the `title` attribute.
     *
     * Usage example:
     * ```php
     * $element->title('SVG text');
     * $element->title(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Advisory title text, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `title` attribute.
     */
    public function title(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TITLE, $value);
    }

    /**
     * Sets the SVG `transform` attribute for the element.
     *
     * Creates a new instance with the specified transform value for the rendered element.
     *
     * @param string|null $value Transform value (for example, 'rotate(45)', 'scale(2)', or `null` to unset).
     *
     * @return static New instance with the updated `transform` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#TransformProperty
     *
     * Usage example:
     * ```php
     * $element->transform('rotate(45)');
     * $element->transform('scale(2)');
     * $element->transform(null);
     * ```
     */
    public function transform(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TRANSFORM, $value);
    }

    /**
     * Sets the SVG `word-spacing` attribute for the element.
     *
     * Creates a new instance with the specified word spacing value for the rendered element.
     *
     * @param float|int|string|null $value Word spacing value (for example, '5', '0.5em', 'normal', or `null` to
     * unset).
     *
     * @return static New instance with the updated `word-spacing` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#WordSpacingProperty
     *
     * Usage example:
     * ```php
     * $element->wordSpacing(5);
     * $element->wordSpacing('0.5em');
     * $element->wordSpacing(null);
     * ```
     */
    public function wordSpacing(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::WORD_SPACING, $value);
    }

    /**
     * Sets SVG `writing-mode` attribute for the element.
     *
     * Creates a new instance with the specified writing mode value for the rendered element.
     *
     * @param string|WritingMode|null $value Writing mode value to set for the element. Accepts 'horizontal-tb',
     * 'vertical-rl', 'vertical-lr', 'sideways-rl', 'sideways-lr', {@see WritingMode} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see WritingMode} enum or string.
     *
     * @return static New instance with the updated `writing-mode` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#WritingModeProperty
     * {@see WritingMode} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->writingMode('vertical-rl');
     * $element->writingMode(WritingMode::HORIZONTAL_TB);
     * $element->writingMode(null);
     * ```
     */
    public function writingMode(string|WritingMode|null $value): static
    {
        Validator::oneOf($value, WritingMode::cases(), SvgAttribute::WRITING_MODE);

        return $this->addAttribute(SvgAttribute::WRITING_MODE, $value);
    }

    /**
     * Sets the SVG `x` attribute for the element.
     *
     * Creates a new instance with the specified x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value X coordinate value (for example, '10', '10.3', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `x` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#XProperty
     *
     * Usage example:
     * ```php
     * $element->x(10);
     * $element->x('50%');
     * $element->x(null);
     * ```
     */
    public function x(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X, $value);
    }

    /**
     * Sets the SVG `y` attribute for the element.
     *
     * Creates a new instance with the specified y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Y coordinate value (for example, '20', '10.3', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `y` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#YProperty
     *
     * Usage example:
     * ```php
     * $element->y(20);
     * $element->y('50%');
     * $element->y(null);
     * ```
     */
    public function y(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y, $value);
    }

    /**
     * Returns the tag enumeration for the `<text>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<text>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::TEXT;
    }
}
