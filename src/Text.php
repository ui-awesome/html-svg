<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Global\HasTitle;
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasDominantBaseline,
    HasDx,
    HasDy,
    HasFill,
    HasFillOpacity,
    HasFillRule,
    HasFontFamily,
    HasFontSize,
    HasFontStyle,
    HasFontWeight,
    HasLengthAdjust,
    HasLetterSpacing,
    HasOpacity,
    HasRotate,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeMiterlimit,
    HasStrokeOpacity,
    HasStrokeWidth,
    HasTextAnchor,
    HasTextDecoration,
    HasTextLength,
    HasTransform,
    HasWordSpacing,
    HasWritingMode,
    HasX,
    HasY,
};
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<text>` (text) element for rendering text content in SVG graphics.
 *
 * Provides a concrete `<text>` element implementation that returns `SvgBlock::TEXT` and mixes in text layout,
 * typography, paint, and transform attribute traits.
 *
 * The `<text>` element defines text content with positioning, layout, and typography attributes.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports global `title` attribute via {@see HasTitle}.
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.) and transform attribute
 *   (`transform`).
 * - Supports text layout attributes (`textLength`, `lengthAdjust`, `text-anchor`, `dominant-baseline`).
 * - Supports text positioning attributes (`x`, `y`, `dx`, `dy`, `rotate`).
 * - Supports typography attributes (`font-family`, `font-size`, `font-weight`, `font-style`, `letter-spacing`,
 *   `word-spacing`, `text-decoration`, `writing-mode`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Text;
 *
 * echo Text::tag()
 *     ->x(12)->y(24)
 *     ->fontSize(16)
 *     ->fill('currentColor')
 *     ->content('Hello SVG')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/text
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Text extends BaseSvgBlockTag
{
    use HasDominantBaseline;
    use HasDx;
    use HasDy;
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasFontFamily;
    use HasFontSize;
    use HasFontStyle;
    use HasFontWeight;
    use HasLengthAdjust;
    use HasLetterSpacing;
    use HasOpacity;
    use HasRotate;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTextAnchor;
    use HasTextDecoration;
    use HasTextLength;
    use HasTitle;
    use HasTransform;
    use HasWordSpacing;
    use HasWritingMode;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<text>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<text>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::TEXT;
    }
}
