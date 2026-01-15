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
 * Provides a standards-compliant, immutable API for rendering the `<marker>` container element, following SVG 2 and
 * HTML specifications for defining markers.
 *
 * The `<marker>` element defines a marker that can be attached to lines, polylines, and polygons.
 *
 * Key features.
 * - Designed for use in SVG tag/component classes requiring marker rendering.
 * - Standards-compliant implementation of the SVG `<marker>` element.
 * - Supports marker-specific attributes like `markerWidth`, `markerHeight`, `markerUnits`, `orient`, `refX`, `refY`,
 *   `viewBox`, and `preserveAspectRatio`.
 * - Supports presentation attributes like `opacity` and `transform`.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/marker
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
