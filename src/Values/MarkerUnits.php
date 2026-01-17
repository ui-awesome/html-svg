<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `markerUnits` attribute.
 *
 * Provides the keyword values used by the `markerUnits` attribute.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring marker units assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `markerUnits` keyword values.
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\Marker::markerUnits()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum MarkerUnits: string
{
    /**
     * `strokeWidth` - The marker coordinate system has its origin at the marker position on the shape, with units
     * scaled by the stroke width of the shape.
     *
     * This is the default value.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerUnitsAttribute
     */
    case STROKE_WIDTH = 'strokeWidth';

    /**
     * `userSpaceOnUse` - The marker coordinate system has its origin at the marker position on the shape, but uses the
     * user coordinate system at the time of reference.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerUnitsAttribute
     */
    case USER_SPACE_ON_USE = 'userSpaceOnUse';
}
