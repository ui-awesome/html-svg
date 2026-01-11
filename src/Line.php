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
 * Provides a standards-compliant, immutable API for rendering the `<line>` element, following the SVG 2 and HTML
 * specifications for defining straight lines.
 *
 * The `<line>` element is an SVG basic shape used to draw a straight line between two points.
 *
 * Key features:
 * - Designed for use in SVG tag/component classes requiring line rendering.
 * - Standards-compliant implementation of the SVG `<line>` element.
 * - Supports all stroke attributes (`stroke-width`, `stroke-dasharray`, etc.).
 * - Supports transform attribute for positioning.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/line
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
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
