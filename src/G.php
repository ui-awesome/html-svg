<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasFill,
    HasFillOpacity,
    HasFillRule,
    HasOpacity,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeMiterlimit,
    HasStrokeOpacity,
    HasStrokeWidth,
    HasTransform,
};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<g>` (group) element for grouping and transforming SVG content.
 *
 * Provides a concrete `<g>` element implementation that returns `SvgBlock::G` and mixes in paint and transform
 * attribute traits.
 *
 * The `<g>` element groups SVG shapes and other elements, allowing shared attributes and transforms.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform attribute (`transform`) for collective transformations.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Circle, G};
 *
 * $dot = Circle::tag()->cx(10)->cy(10)->r(4)->fill('currentColor')->render();
 *
 * echo G::tag()
 *     ->transform('translate(20 20)')
 *     ->opacity(0.8)
 *     ->content($dot)
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/g
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class G extends Base\BaseSvgBlockTag
{
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasOpacity;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTransform;

    /**
     * Returns the tag enumeration for the `<g>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<g>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::G;
    }
}
