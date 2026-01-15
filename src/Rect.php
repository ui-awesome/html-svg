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
 * Provides a standards-compliant, immutable API for rendering the `<rect>` element, following the SVG 2 and HTML
 * specifications for defining rectangular shapes.
 *
 * The `<rect>` element is an SVG basic shape used to create rectangles based on a position and size.
 *
 * Key features:
 * - Designed for use in SVG tag/component classes requiring rectangle rendering.
 * - Standards-compliant implementation of the SVG `<rect>` element.
 * - Supports all paint attributes (`fill`, `stroke`, `opacity`).
 * - Supports transform attribute for positioning and scaling.
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
