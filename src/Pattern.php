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
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<pattern>` element for defining reusable patterns.
 *
 * Provides a concrete `<pattern>` element implementation that returns `SvgBlock::PATTERN` and mixes in geometry,
 * linking, pattern, and view attribute traits.
 *
 * The `<pattern>` element defines a pattern that can be referenced by `fill` and `stroke` attributes.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports linking attribute (`href`).
 * - Supports pattern-specific attributes (`patternUnits`, `patternContentUnits`, `patternTransform`).
 * - Supports view attributes (`viewBox`, `preserveAspectRatio`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Pattern, Rect};
 *
 * $tile = Rect::tag()->x(0)->y(0)->width(4)->height(4)->fill('currentColor')->render();
 *
 * echo Pattern::tag()->id('tile')->x(0)->y(0)->width(4)->height(4)->content($tile)->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/pattern
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Pattern extends BaseSvgBlockTag
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
