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
 * Provides a method that delegates to `addAttribute()` to set the `markerUnits` attribute on SVG marker elements.
 *
 * Intended for use in SVG tag and component classes that set marker units.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `markerUnits` attribute.
 * - Designed for use in SVG marker tag and component classes.
 * - Immutable method for setting or overriding the `markerUnits` attribute.
 * - Supports `string`, {@see MarkerUnits} enum, and `null` for flexible marker coordinate system assignment (specific
 *   value or unset).
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
     * Creates a new instance with the specified marker units value for the rendered element.
     *
     * @param MarkerUnits|string|null $value Marker units value (for example, `'strokeWidth'`,
     * {@see MarkerUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see MarkerUnits} enum or `string`.
     *
     * @return static New instance with the updated `markerUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerUnitsAttribute
     * {@see MarkerUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->markerUnits('strokeWidth');
     * $element->markerUnits(MarkerUnits::USER_SPACE_ON_USE);
     * $element->markerUnits(null);
     * ```
     */
    public function markerUnits(MarkerUnits|string|null $value): static
    {
        Validator::oneOf($value, MarkerUnits::cases(), SvgAttribute::MARKER_UNITS);

        return $this->addAttribute(SvgAttribute::MARKER_UNITS, $value);
    }
}
