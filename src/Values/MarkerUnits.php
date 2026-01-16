<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG `markerUnits` attribute.
 *
 * Provides a type-safe, standards-compliant set of values for use in SVG marker element rendering, ensuring technical
 * consistency with SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring marker units assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `markerUnits` values for semantic markup generation and accessibility.
 * - Values follow SVG 2 specification for marker coordinate systems.
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
