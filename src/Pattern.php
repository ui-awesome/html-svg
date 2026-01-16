<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasHref, HasWidth};
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasPatternContentUnits,
    HasPatternTransform,
    HasPatternUnits,
    HasPreserveAspectRatio,
    HasViewBox,
    HasX,
    HasY,
};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<pattern>` element for defining reusable patterns.
 *
 * Provides a standards-compliant, immutable API for rendering the `<pattern>` container element, following SVG 2 and
 * HTML specifications for defining patterns.
 *
 * The `<pattern>` element defines a pattern that can be referenced by fill/stroke.
 *
 * Key features.
 * - Designed for use in SVG tag/component classes requiring pattern rendering.
 * - Standards-compliant implementation of the SVG `<pattern>` element.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/pattern
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Pattern extends Base\BaseSvgBlockTag
{
    use HasHeight;
    use HasHref;
    use HasPatternContentUnits;
    use HasPatternTransform;
    use HasPatternUnits;
    use HasPreserveAspectRatio;
    use HasViewBox;
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<pattern>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<pattern>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::PATTERN;
    }
}
