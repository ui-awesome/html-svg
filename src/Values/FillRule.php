<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `fill-rule` attribute.
 *
 * Provides the keyword values used by the `fill-rule` attribute.
 *
 * @see \UIAwesome\Html\Svg\Circle::fillRule()
 * @see \UIAwesome\Html\Svg\Ellipse::fillRule()
 * @see \UIAwesome\Html\Svg\G::fillRule()
 * @see \UIAwesome\Html\Svg\Line::fillRule()
 * @see \UIAwesome\Html\Svg\Path::fillRule()
 * @see \UIAwesome\Html\Svg\Polygon::fillRule()
 * @see \UIAwesome\Html\Svg\Polyline::fillRule()
 * @see \UIAwesome\Html\Svg\Rect::fillRule()
 * @see \UIAwesome\Html\Svg\Text::fillRule()
 */
enum FillRule: string
{
    /**
     * `evenodd` - This value determines the "insideness" of a point on the canvas by drawing a ray from that point to
     * infinity in any direction and counting the number of path segments from the given shape that the ray crosses.
     *
     * If this number is odd, the point is inside; if even, the point is outside.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#FillRuleProperty
     */
    case EVENODD = 'evenodd';

    /**
     * `nonzero` - This value determines the "insideness" of a point on the canvas by drawing a ray from that point to
     * infinity in any direction and counting the number of path segments from the given shape that the ray crosses.
     *
     * @see https://www.w3.org/TR/SVG2/painting.html#FillRuleProperty
     */
    case NONZERO = 'nonzero';
}
