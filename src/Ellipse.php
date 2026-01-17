<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasCx,
    HasCy,
    HasFill,
    HasFillOpacity,
    HasFillRule,
    HasOpacity,
    HasPathLength,
    HasRx,
    HasRy,
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
 * Represents the SVG `<ellipse>` (ellipse) element for rendering ellipses.
 *
 * Provides a concrete `<ellipse>` element implementation that returns `SvgVoid::ELLIPSE` and mixes in geometry,
 * paint, and transform attribute traits.
 *
 * The `<ellipse>` element is an SVG basic shape used to create ellipses based on a center point and two radii.
 *
 * Key features.
 * - Supports geometry attributes (`cx`, `cy`, `rx`, `ry`, `pathLength`).
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/ellipse
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Ellipse extends BaseVoid
{
    use HasCx;
    use HasCy;
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasOpacity;
    use HasPathLength;
    use HasRx;
    use HasRy;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTransform;

    /**
     * Returns the tag enumeration for the `<ellipse>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<ellipse>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::ELLIPSE;
    }
}
