<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasD,
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
};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<path>` (path) element for rendering complex shapes.
 *
 * Provides a standards-compliant, immutable API for rendering the `<path>` element, following the SVG 2 and HTML
 * specifications for defining arbitrary shapes.
 *
 * The `<path>` element is the most powerful SVG element for drawing arbitrary shapes, using a path data string.
 *
 * Key features:
 * - Designed for use in SVG tag/component classes requiring complex shape rendering.
 * - Standards-compliant implementation of the SVG `<path>` element.
 * - Supports all paint attributes (`d`, `fill`, `opacity`, `pathLength`,`stroke`).
 * - Supports transform attribute for positioning and scaling.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/path
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Path extends BaseVoid
{
    use HasD;
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

    /**
     * Returns the tag enumeration for the `<path>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<path>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::PATH;
    }
}
