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
use UIAwesome\Html\Svg\Values\CoordinateUnits;
use UIAwesome\Html\Svg\Values\SpreadMethod;
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Represents the SVG `<radialGradient>` element for defining radial gradients.
 *
 * Provides a concrete `<radialGradient>` element implementation that returns {@see SvgBlock::RADIAL_GRADIENT} and
 * provides gradient and geometry attribute methods.
 *
 * The `<radialGradient>` element defines a radial gradient that can be referenced by `fill` and `stroke`.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports gradient attributes (`gradientUnits`, `gradientTransform`, `spreadMethod`, `href`).
 * - Supports opacity attribute.
 * - Supports radial gradient geometry attributes (`cx`, `cy`, `r`, `fx`, `fy`, `fr`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{RadialGradient, Stop};
 *
 * echo RadialGradient::tag()
 *     ->id('spot')
 *     ->cx('50%')
 *     ->cy('50%')
 *     ->r('50%')
 *     ->content(
 *         Stop::tag()->offset('0%')->stopColor('#ffffff')->stopOpacity(1),
 *         Stop::tag()->offset('100%')->stopColor('#000000')->stopOpacity(1),
 *     )
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/radialGradient
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RadialGradient extends BaseSvgBlockTag
{
    /**
     * Sets the SVG `cx` attribute for the element.
     *
     * Creates a new instance with the specified center x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Center x-coordinate value (for example, '50', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `cx` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#CxProperty
     *
     * Usage example:
     * ```php
     * $element->cx(50);
     * $element->cx('50%');
     * $element->cx(null);
     * ```
     */
    public function cx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::CX, $value);
    }

    /**
     * Sets the SVG `cy` attribute for the element.
     *
     * Creates a new instance with the specified center y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Center y-coordinate value (for example, '50', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `cy` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#CyProperty
     *
     * Usage example:
     * ```php
     * $element->cy(50);
     * $element->cy('50%');
     * $element->cy(null);
     * ```
     */
    public function cy(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::CY, $value);
    }

    /**
     * Sets the SVG `fr` attribute for the element.
     *
     * Creates a new instance with the specified start circle radius value for the rendered element.
     *
     * @param float|int|string|null $value Start circle radius value (for example, '25', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `fr` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#RadialGradientElementFRAttribute
     *
     * Usage example:
     * ```php
     * $element->fr(25);
     * $element->fr('50%');
     * $element->fr(null);
     * ```
     */
    public function fr(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FR, $value);
    }

    /**
     * Sets the SVG `fx` attribute for the element.
     *
     * Creates a new instance with the specified start circle x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Start circle x-coordinate value (for example, '50', '50%', or `null` to
     * unset).
     *
     * @return static New instance with the updated `fx` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#RadialGradientElementFXAttribute
     *
     * Usage example:
     * ```php
     * $element->fx(50);
     * $element->fx('50%');
     * $element->fx(null);
     * ```
     */
    public function fx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FX, $value);
    }

    /**
     * Sets the SVG `fy` attribute for the element.
     *
     * Creates a new instance with the specified start circle y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Start circle y-coordinate value (for example, '50', '50%', or `null` to
     * unset).
     *
     * @return static New instance with the updated `fy` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#RadialGradientElementFYAttribute
     *
     * Usage example:
     * ```php
     * $element->fy(50);
     * $element->fy('50%');
     * $element->fy(null);
     * ```
     */
    public function fy(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FY, $value);
    }

    /**
     * Sets the SVG `gradientTransform` attribute for the gradient element.
     *
     * Creates a new instance with the specified gradient transform value for the rendered element.
     *
     * @param string|null $value Transform value (for example, 'rotate(45)', 'scale(2)', or `null` to unset).
     *
     * @return static New instance with the updated `gradientTransform` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientTransformAttribute
     *
     * Usage example:
     * ```php
     * $element->gradientTransform('rotate(45)');
     * $element->gradientTransform('scale(2)');
     * $element->gradientTransform(null);
     * ```
     */
    public function gradientTransform(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::GRADIENT_TRANSFORM, $value);
    }

    /**
     * Sets the SVG `gradientUnits` attribute for the gradient element.
     *
     * Creates a new instance with the specified gradient units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Gradient units value (for example, 'userSpaceOnUse',
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `gradientUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientUnitsAttribute
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->gradientUnits('userSpaceOnUse');
     * $element->gradientUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * $element->gradientUnits(null);
     * ```
     */
    public function gradientUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::GRADIENT_UNITS);

        return $this->addAttribute(SvgAttribute::GRADIENT_UNITS, $value);
    }

    /**
     * Sets the `href` attribute.
     *
     * Usage example:
     * ```php
     * $element->href('#gradient');
     * $element->href(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value URL, path, or fragment, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `href` attribute.
     */
    public function href(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(SvgAttribute::HREF, $value);
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
     * Sets the SVG `r` attribute for the element.
     *
     * Creates a new instance with the specified radius value for the rendered element.
     *
     * @param float|int|string|null $value Radius value (for example, '25', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `r` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#R
     *
     * Usage example:
     * ```php
     * $element->r(25);
     * $element->r('50%');
     * $element->r(null);
     * ```
     */
    public function r(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::R, $value);
    }

    /**
     * Sets the SVG `spreadMethod` attribute for the gradient element.
     *
     * Creates a new instance with the specified spread method value for the rendered element.
     *
     * @param SpreadMethod|string|null $value Spread method value (for example, 'pad', {@see SpreadMethod} enum, or
     * `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see SpreadMethod} enum or string.
     *
     * @return static New instance with the updated `spreadMethod` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     * {@see SpreadMethod} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->spreadMethod('pad');
     * $element->spreadMethod(SpreadMethod::REFLECT);
     * $element->spreadMethod(null);
     * ```
     */
    public function spreadMethod(SpreadMethod|string|null $value): static
    {
        Validator::oneOf($value, SpreadMethod::cases(), SvgAttribute::SPREAD_METHOD);

        return $this->addAttribute(SvgAttribute::SPREAD_METHOD, $value);
    }

    /**
     * Returns the tag enumeration for the `<radialGradient>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<radialGradient>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::RADIAL_GRADIENT;
    }
}
