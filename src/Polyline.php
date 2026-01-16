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
 * Represents the SVG `<polyline>` (polyline) element for rendering polylines.
 *
 * Provides a standards-compliant, immutable API for rendering the `<polyline>` element, following the SVG 2 and HTML
 * specifications for defining connected line sequences.
 *
 * The `<polyline>` element is an SVG basic shape used to create a series of connected line segments.
 *
 * Key features.
 * - Supports geometry attributes (`points`, `pathLength`).
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polyline
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Polyline extends BaseVoid
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
     * Returns the tag enumeration for the `<polyline>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<polyline>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::POLYLINE;
    }
}
