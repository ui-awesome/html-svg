<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{MarkerUnits, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing the SVG `markerUnits` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `markerUnits` attribute on SVG marker elements,
 * following the SVG 2 specification for marker coordinate systems.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the marker units
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG marker tag and component classes.
 * - Enforces standards-compliant handling of the SVG `markerUnits` attribute.
 * - Immutable method for setting or overriding the `markerUnits` attribute.
 * - Supports string, UnitEnum, and `null` for flexible marker coordinate system assignment (specific value or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/markerUnits
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMarkerUnits
{
    /**
     * Sets the SVG `markerUnits` attribute for the marker element.
     *
     * Creates a new instance with the specified marker units value, supporting explicit assignment according to the SVG
     * 2 specification for defining the coordinate system of marker attributes.
     *
     * @param string|UnitEnum|null $value Marker units value to set for the element. Accepts 'strokeWidth', 
     * 'userSpaceOnUse', {@see MarkerUnits} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see MarkerUnits} enum or string.
     *
     * @return static New instance with the updated `markerUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerUnitsAttribute
     * {@see MarkerUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `markerUnits` attribute to 'strokeWidth'
     * $element->markerUnits('strokeWidth');
     *
     * // sets the `markerUnits` attribute using an enum
     * $element->markerUnits(MarkerUnits::USER_SPACE_ON_USE);
     *
     * // unsets the `markerUnits` attribute
     * $element->markerUnits(null);
     * ```
     */
    public function markerUnits(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, MarkerUnits::cases(), SvgAttribute::MARKER_UNITS);

        return $this->addAttribute(SvgAttribute::MARKER_UNITS, $value);
    }
}
