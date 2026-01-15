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
 * Provides a standards-compliant, immutable API for rendering the `<mask>` container element, following SVG 2 and CSS
 * Masking specifications for defining masks.
 *
 * The `<mask>` element defines a mask that can be applied to other elements.
 *
 * Key features.
 * - Designed for use in SVG tag/component classes requiring mask rendering.
 * - Standards-compliant implementation of the SVG `<mask>` element.
 * - Supports `maskUnits`, `maskContentUnits`, and `mask-type` attributes.
 * - Supports masking area attributes (`x`, `y`, `width`, `height`).
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/mask
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
