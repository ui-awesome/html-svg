<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `stroke-linecap` attribute.
 *
 * Provides a type-safe, standards-compliant set of stroke line cap values for use in SVG element rendering, attributes,
 * and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring stroke line cap assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `stroke-linecap` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `stroke-linecap` attribute.
 *
 * @see \UIAwesome\Html\Svg\Circle::strokeLineCap()
 * @see \UIAwesome\Html\Svg\Ellipse::strokeLineCap()
 * @see \UIAwesome\Html\Svg\G::strokeLineCap()
 * @see \UIAwesome\Html\Svg\Line::strokeLineCap()
 * @see \UIAwesome\Html\Svg\Path::strokeLineCap()
 * @see \UIAwesome\Html\Svg\Polygon::strokeLineCap()
 * @see \UIAwesome\Html\Svg\Polyline::strokeLineCap()
 * @see \UIAwesome\Html\Svg\Rect::strokeLineCap()
 * @see \UIAwesome\Html\Svg\Text::strokeLineCap()
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum StrokeLineCap: string
{
    /**
     * `butt` - Stroke is squared off at the endpoint of the path. This is the default value.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineCaps
     */
    case BUTT = 'butt';

    /**
     * `round` - Stroke is rounded at the endpoint of the path.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineCaps
     */
    case ROUND = 'round';

    /**
     * `square` - Stroke continues beyond the endpoint of the path for a distance equal to half the stroke width.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineCaps
     */
    case SQUARE = 'square';
}
