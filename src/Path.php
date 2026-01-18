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
 * Provides a concrete `<path>` element implementation that returns `SvgVoid::PATH` and mixes in path, paint, and
 * transform attribute traits.
 *
 * The `<path>` element draws arbitrary shapes defined by a path data string.
 *
 * Key features.
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports path and geometry attributes (`d`, `pathLength`).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Path;
 *
 * $d = 'M10 10H90V90H10z';
 *
 * echo Path::tag()
 *     ->d($d)
 *     ->fill('currentColor')
 *     ->render();
 * ```
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
