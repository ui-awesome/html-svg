<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized keyword values for the SVG `orient` attribute.
 *
 * Provides the keyword values used by the `orient` attribute.
 *
 * Note: The `orient` attribute also accepts numeric angle values (for example, '45', '90deg'). This enum covers only
 * the keyword values. Use `string`, `int`, or `float` for angle values.
 *
 * @see \UIAwesome\Html\Svg\Marker::orient()
 */
enum Orient: string
{
    /**
     * `auto` - The marker is oriented such that its positive x-axis is pointing in the direction of the path at the
     * point it is placed.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#MarkerElementOrientAttribute
     */
    case AUTO = 'auto';

    /**
     * `auto-start-reverse` - If placed by `marker-start`, the marker is oriented 180° different from the orientation
     * that would be used if `auto` were specified. For all other markers, `auto-start-reverse` means the same as
     * `auto`.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#MarkerElementOrientAttribute
     */
    case AUTO_START_REVERSE = 'auto-start-reverse';
}
