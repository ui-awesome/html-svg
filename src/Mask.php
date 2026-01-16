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
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports mask-specific attributes (`maskUnits`, `maskContentUnits`, `mask-type`).
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
