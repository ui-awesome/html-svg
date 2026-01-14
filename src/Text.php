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
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<text>` (text) element for rendering text content in SVG graphics.
 *
 * Provides a standards-compliant, immutable API for rendering the `<text>` element, following the SVG 2 and HTML
 * specifications for text content, positioning, typography, and text decoration.
 *
 * The `<text>` element is used to define text in SVG graphics. It supports advanced typography features including text
 * positioning (`x`, `y`, `dx`, `dy`, `rotate`), text rendering adjustments (`textLength`, `lengthAdjust`), alignment
 * (`textAnchor`, `dominantBaseline`), font properties (`fontFamily`, `fontSize`, `fontWeight`, `fontStyle`), spacing
 * (`letterSpacing`, `wordSpacing`), decoration (`textDecoration`), and writing mode (`writingMode`).
 *
 * Key features:
 * - Designed for use in SVG tag/component classes requiring text rendering.
 * - Standards-compliant implementation of the SVG `<text>` element.
 * - Supports comprehensive text positioning, typography, and decoration attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/text
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Text extends Base\BaseSvgBlockTag
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
