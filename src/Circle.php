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
    HasR,
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
 * Represents the SVG `<circle>` (circle) element for rendering circles.
 *
 * Provides a standards-compliant, immutable API for rendering the `<circle>` element, following the SVG 2 and HTML
 * specifications for defining circle shapes.
 *
 * The `<circle>` element is an SVG basic shape used to create circles based on a center point and a radius.
 *
 * Key features:
 * - Designed for use in SVG tag/component classes requiring circle rendering.
 * - Standards-compliant implementation of the SVG `<circle>` element.
 * - Supports all paint attributes (`fill`, `stroke`, `opacity`).
 * - Supports transform attribute for positioning and scaling.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/circle
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Circle extends BaseVoid
{
    use HasCx;
    use HasCy;
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasOpacity;
    use HasR;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTransform;

    /**
     * Returns the tag enumeration for the `<circle>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<circle>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::CIRCLE;
    }
}
