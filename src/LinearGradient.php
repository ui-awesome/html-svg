<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\CoordinateUnits;
use UIAwesome\Html\Svg\Values\SpreadMethod;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Represents the SVG `<linearGradient>` (linearGradient) element for defining linear gradients.
 *
 * Provides a concrete `<linearGradient>` element implementation that returns {@see SvgBlock::LINEAR_GRADIENT} and
 * provides gradient and coordinate attribute methods.
 *
 * The `<linearGradient>` element defines a linear gradient with coordinates and gradient attributes.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports gradient attributes (`gradientUnits`, `gradientTransform`, `spreadMethod`).
 * - Supports gradient geometry attributes (`x1`, `y1`, `x2`, `y2`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{LinearGradient, Stop};
 *
 * echo LinearGradient::tag()
 *     ->id('accent')
 *     ->x1('0%')
 *     ->y1('0%')
 *     ->x2('100%')
 *     ->y2('0%')
 *     ->content(
 *         Stop::tag()->offset('0%')->stopColor('#0ea5e9')->stopOpacity(1),
 *         Stop::tag()->offset('100%')->stopColor('#1d4ed8')->stopOpacity(1),
 *     )
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/linearGradient
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class LinearGradient extends BaseSvgBlockTag
{
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
     * Sets the SVG `x1` attribute for the element.
     *
     * Creates a new instance with the specified first x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value First x coordinate value (for example, '10', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `x1` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementX1Attribute
     *
     * Usage example:
     * ```php
     * $element->x1(10);
     * $element->x1('50%');
     * $element->x1(null);
     * ```
     */
    public function x1(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X1, $value);
    }

    /**
     * Sets the SVG `x2` attribute for the element.
     *
     * Creates a new instance with the specified second x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Second x coordinate value (for example, '10', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `x2` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementX2Attribute
     *
     * Usage example:
     * ```php
     * $element->x2(10);
     * $element->x2('50%');
     * $element->x2(null);
     * ```
     */
    public function x2(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X2, $value);
    }

    /**
     * Sets the SVG `y1` attribute for the element.
     *
     * Creates a new instance with the specified first y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value First y coordinate value (for example, '10', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `y1` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementY1Attribute
     *
     * Usage example:
     * ```php
     * $element->y1(10);
     * $element->y1('50%');
     * $element->y1(null);
     * ```
     */
    public function y1(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y1, $value);
    }

    /**
     * Sets the SVG `y2` attribute for the element.
     *
     * Creates a new instance with the specified second y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Second y coordinate value (for example, '10', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `y2` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementY2Attribute
     *
     * Usage example:
     * ```php
     * $element->y2(10);
     * $element->y2('50%');
     * $element->y2(null);
     * ```
     */
    public function y2(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y2, $value);
    }

    /**
     * Returns the tag enumeration for the `<linearGradient>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<linearGradient>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::LINEAR_GRADIENT;
    }
}
