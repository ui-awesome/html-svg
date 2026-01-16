<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `stroke-linejoin` attribute.
 *
 * Provides a type-safe, standards-compliant set of stroke line join values for use in SVG element rendering,
 * attributes, and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring stroke line join assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `stroke-linejoin` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `stroke-linejoin` attribute.
 *
 * @see \UIAwesome\Html\Svg\Circle::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\Ellipse::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\G::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\Line::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\Path::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\Polygon::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\Polyline::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\Rect::strokeLineJoin()
 * @see \UIAwesome\Html\Svg\Text::strokeLineJoin()
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum StrokeLineJoin: string
{
    /**
     * `arcs` - Stroke is drawn using circular arcs to join segments.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case ARCS = 'arcs';

    /**
     * `bevel` - Stroke is squared off at the join.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case BEVEL = 'bevel';

    /**
     * `miter` - Stroke is extended to a sharp point.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case MITER = 'miter';

    /**
     * `miter-clip` - Stroke is extended to a sharp point, but clipped to avoid excessively long miters.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case MITER_CLIP = 'miter-clip';

    /**
     * `round` - Stroke is rounded at the join.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case ROUND = 'round';
}
