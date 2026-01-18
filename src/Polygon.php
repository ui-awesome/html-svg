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
    HasPoints,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeMiterlimit,
    HasStrokeOpacity,
    HasStrokeWidth,
    HasTransform,
};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<polygon>` (polygon) element for rendering polygons.
 *
 * Provides a concrete `<polygon>` element implementation that returns `SvgVoid::POLYGON` and mixes in geometry,
 * paint, and transform attribute traits.
 *
 * The `<polygon>` element is an SVG basic shape used to create closed shapes defined by a list of points.
 *
 * Key features.
 * - Supports geometry attribute (`points`).
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Polygon;
 *
 * echo Polygon::tag()
 *     ->points('60 10 90 90 10 90')
 *     ->fill('currentColor')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polygon
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Polygon extends BaseVoid
{
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasOpacity;
    use HasPathLength;
    use HasPoints;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTransform;

    /**
     * Returns the tag enumeration for the `<polygon>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<polygon>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::POLYGON;
    }
}
