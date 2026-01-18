<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasMaskContentUnits, HasMaskType, HasMaskUnits, HasX, HasY};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<mask>` element for defining masking regions.
 *
 * Provides a concrete `<mask>` element implementation that returns `SvgBlock::MASK` and mixes in mask and geometry
 * attribute traits.
 *
 * The `<mask>` element defines a mask that can be applied to other elements.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports mask-specific attributes (`maskUnits`, `maskContentUnits`, `mask-type`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Mask, Rect};
 * use UIAwesome\Html\Svg\Values\MaskType;
 *
 * $content = Rect::tag()->x(0)->y(0)->width(100)->height(100)->fill('currentColor')->render();
 *
 * echo Mask::tag()
 *     ->id('fade')
 *     ->maskType(MaskType::LUMINANCE)
 *     ->content($content)
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/mask
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Mask extends Base\BaseSvgBlockTag
{
    use HasHeight;
    use HasMaskContentUnits;
    use HasMaskType;
    use HasMaskUnits;
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<mask>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<mask>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::MASK;
    }
}
