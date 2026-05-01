<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgVoid;
use UIAwesome\Html\Svg\Values\FillRule;
use UIAwesome\Html\Svg\Values\StrokeLineCap;
use UIAwesome\Html\Svg\Values\StrokeLineJoin;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Represents the SVG `<path>` (path) element for rendering complex shapes.
 *
 * Provides a concrete `<path>` element implementation that returns {@see SvgVoid::PATH} and provides path, paint, and
 * transform attribute methods.
 *
 * The `<path>` element draws arbitrary shapes defined by a path data string.
 *
 * Key features.
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports path and geometry attributes (`d`, `pathLength`).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Path;
 *
 * echo Path::tag()
 *     ->d('M10 10H90V90H10z')
 *     ->fill('currentColor')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/path
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Path extends BaseVoid
{
    /**
     * Sets the SVG `d` attribute for the element.
     *
     * Creates a new instance with the specified path data value for the rendered element.
     *
     * @param string|null $value Path data string (for example, 'M10 10 H 90 V 90 H 10 Z', or `null` to unset).
     *
     * @return static New instance with the updated `d` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/paths.html#DAttribute
     *
     * Usage example:
     * ```php
     * $element->d('M10 10 H 90 V 90 H 10 Z');
     * $element->d(null);
     * ```
     */
    public function d(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::D, $value);
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
     * Sets the SVG `pathLength` attribute for the element.
     *
     * Creates a new instance with the specified path length value for the rendered element.
     *
     * @param float|int|string|null $value Path length value (for example, '100', '50.5', or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a positive number or `null`.
     *
     * @return static New instance with the updated `pathLength` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/paths.html#PathLengthAttribute
     *
     * Usage example:
     * ```php
     * $element->pathLength(100);
     * $element->pathLength(50.5);
     * $element->pathLength(null);
     * ```
     */
    public function pathLength(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL->getMessage(),
            );
        }

        return $this->addAttribute(SvgAttribute::PATH_LENGTH, $value);
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
     * Returns the tag enumeration for the `<path>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<path>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgVoid::PATH;
    }
}
