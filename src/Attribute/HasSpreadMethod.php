<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{SpreadMethod, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing the SVG `spreadMethod` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `spreadMethod` attribute on SVG gradient elements,
 * following the SVG 2 specification for gradient spread methods.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the spread method
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG gradient tag and component classes.
 * - Enforces standards-compliant handling of the SVG `spreadMethod` attribute.
 * - Immutable method for setting or overriding the `spreadMethod` attribute.
 * - Supports string, UnitEnum, and `null` for flexible spread method assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/spreadMethod
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSpreadMethod
{
    /**
     * Sets the SVG `spreadMethod` attribute for the gradient element.
     *
     * Creates a new instance with the specified spread method value, supporting explicit assignment according to the
     * SVG 2 specification for defining how a gradient behaves beyond its defined edges.
     *
     * @param string|UnitEnum|null $value Spread method value to set for the element. Accepts 'pad', 'reflect',
     * 'repeat', {@see SpreadMethod} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see SpreadMethod} enum or string.
     *
     * @return static New instance with the updated `spreadMethod` attribute.
     *
     * @link https://svgwg.org/svg2-draft/pservers.html#LinearGradientElementSpreadMethodAttribute
     * {@see SpreadMethod} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `spreadMethod` attribute to 'pad'
     * $element->spreadMethod('pad');
     *
     * // sets the `spreadMethod` attribute using an enum
     * $element->spreadMethod(SpreadMethod::REFLECT);
     *
     * // unsets the `spreadMethod` attribute
     * $element->spreadMethod(null);
     * ```
     */
    public function spreadMethod(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, SpreadMethod::cases(), SvgAttribute::SPREAD_METHOD);

        return $this->addAttribute(SvgAttribute::SPREAD_METHOD, $value);
    }
}
