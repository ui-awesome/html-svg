<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized keyword values for the SVG `orient` attribute.
 *
 * Provides a type-safe, standards-compliant set of keyword values for use in SVG marker element rendering, ensuring
 * technical consistency with SVG 2 specification and modern web standards.
 *
 * Note: The `orient` attribute also accepts numeric angle values (for example, `45`, `'90deg'`). This enum covers
 * only the keyword values. Use `string` or numeric types for angle values.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring marker orientation assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `orient` keyword values for semantic markup generation.
 * - Values follow SVG 2 specification for marker orientation.
 *
 * @see \UIAwesome\Html\Svg\Marker::orient()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Orient: string
{
    /**
     * `auto` - The marker is oriented such that its positive x-axis is pointing in the direction of the path at the
     * point it is placed.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementOrientAttribute
     */
    case AUTO = 'auto';

    /**
     * `auto-start-reverse` - If placed by `marker-start`, the marker is oriented 180° different from the orientation
     * that would be used if `auto` were specified. For all other markers, `auto-start-reverse` means the same as
     * `auto`.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementOrientAttribute
     */
    case AUTO_START_REVERSE = 'auto-start-reverse';
}
