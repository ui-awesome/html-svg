<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasMarkerHeight,
    HasMarkerUnits,
    HasMarkerWidth,
    HasOpacity,
    HasOrient,
    HasPreserveAspectRatio,
    HasRefX,
    HasRefY,
    HasTransform,
    HasViewBox,
};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<marker>` element for defining arrowheads and other markers.
 *
 * Provides a concrete `<marker>` element implementation that returns `SvgBlock::MARKER` and mixes in marker, view, and
 * presentation attribute traits.
 *
 * The `<marker>` element defines a marker that can be attached to lines, polylines, and polygons.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports marker attributes (`markerWidth`, `markerHeight`, `markerUnits`, `orient`, `refX`, `refY`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform attribute (`transform`).
 * - Supports view attributes (`viewBox`, `preserveAspectRatio`).
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/marker
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Marker extends Base\BaseSvgBlockTag
{
    use HasMarkerHeight;
    use HasMarkerUnits;
    use HasMarkerWidth;
    use HasOpacity;
    use HasOrient;
    use HasPreserveAspectRatio;
    use HasRefX;
    use HasRefY;
    use HasTransform;
    use HasViewBox;

    /**
     * Returns the tag enumeration for the `<marker>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<marker>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::MARKER;
    }
}
