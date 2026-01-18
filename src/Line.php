<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasFill,
    HasFillOpacity,
    HasFillRule,
    HasOpacity,
    HasPathLength,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeMiterlimit,
    HasStrokeOpacity,
    HasStrokeWidth,
    HasTransform,
    HasX1,
    HasX2,
    HasY1,
    HasY2,
};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<line>` (line) element for rendering straight lines.
 *
 * Provides a concrete `<line>` element implementation that returns `SvgVoid::LINE` and mixes in geometry, paint, and
 * transform attribute traits.
 *
 * The `<line>` element is an SVG basic shape used to draw a straight line between two points.
 *
 * Key features.
 * - Supports geometry attributes (`x1`, `y1`, `x2`, `y2`).
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Line;
 *
 * echo Line::tag()
 *     ->x1(10)->y1(10)->x2(90)->y2(90)
 *     ->stroke('currentColor')->strokeWidth(2)
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/line
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Line extends BaseVoid
{
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasOpacity;
    use HasPathLength;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTransform;
    use HasX1;
    use HasX2;
    use HasY1;
    use HasY2;

    /**
     * Returns the tag enumeration for the `<line>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<line>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::LINE;
    }
}
