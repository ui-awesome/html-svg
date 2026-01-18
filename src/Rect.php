<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasFill,
    HasFillOpacity,
    HasFillRule,
    HasOpacity, HasPathLength, HasRx, HasRy,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeMiterlimit,
    HasStrokeOpacity,
    HasStrokeWidth,
    HasTransform,
    HasX,
    HasY,
};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<rect>` (rectangle) element for rendering rectangles.
 *
 * Provides a concrete `<rect>` element implementation that returns `SvgVoid::RECT` and mixes in geometry, paint, and
 * transform attribute traits.
 *
 * The `<rect>` element is an SVG basic shape used to create rectangles based on position and size attributes.
 *
 * Key features.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`, `rx`, `ry`, `pathLength`).
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Rect;
 *
 * echo Rect::tag()
 *     ->x(10)->y(10)->width(80)->height(50)
 *     ->rx(8)->ry(8)
 *     ->fill('currentColor')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/rect
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Rect extends BaseVoid
{
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasHeight;
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
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<rect>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<rect>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::RECT;
    }
}
