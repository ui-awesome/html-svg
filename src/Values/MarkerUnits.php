<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `markerUnits` attribute.
 *
 * Provides the keyword values used by the `markerUnits` attribute.
 *
 * @see \UIAwesome\Html\Svg\Marker::markerUnits()
 */
enum MarkerUnits: string
{
    /**
     * `strokeWidth` - The marker coordinate system has its origin at the marker position on the shape, with units
     * scaled by the stroke width of the shape.
     *
     * This is the default value.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerUnitsAttribute
     */
    case STROKE_WIDTH = 'strokeWidth';

    /**
     * `userSpaceOnUse` - The marker coordinate system has its origin at the marker position on the shape, but uses the
     * user coordinate system at the time of reference.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerUnitsAttribute
     */
    case USER_SPACE_ON_USE = 'userSpaceOnUse';
}
