<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `stroke-linecap` attribute.
 *
 * Provides the keyword values used by the `stroke-linecap` attribute.
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
 */
enum StrokeLineCap: string
{
    /**
     * `butt` - Stroke is squared off at the endpoint of the path. This is the default value.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineCaps
     */
    case BUTT = 'butt';

    /**
     * `round` - Stroke is rounded at the endpoint of the path.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineCaps
     */
    case ROUND = 'round';

    /**
     * `square` - Stroke continues beyond the endpoint of the path for a distance equal to half the stroke width.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineCaps
     */
    case SQUARE = 'square';
}
