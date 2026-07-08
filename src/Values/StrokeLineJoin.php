<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `stroke-linejoin` attribute.
 *
 * Provides the keyword values used by the `stroke-linejoin` attribute.
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
 */
enum StrokeLineJoin: string
{
    /**
     * `arcs` - Stroke is drawn using circular arcs to join segments.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case ARCS = 'arcs';

    /**
     * `bevel` - Stroke is squared off at the join.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case BEVEL = 'bevel';

    /**
     * `miter` - Stroke is extended to a sharp point.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case MITER = 'miter';

    /**
     * `miter-clip` - Stroke is extended to a sharp point, but clipped to avoid excessively long miters.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case MITER_CLIP = 'miter-clip';

    /**
     * `round` - Stroke is rounded at the join.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#LineJoin
     */
    case ROUND = 'round';
}
