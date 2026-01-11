<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasTransform, HasX, HasY};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<foreignObject>` element for rendering foreign content.
 *
 * Provides a standards-compliant, immutable API for rendering the `<foreignObject>` container element, following SVG 2
 * and HTML specifications for embedding XHTML content.
 *
 * The `<foreignObject>` element allows embedding of external XHTML/XML content within SVG.
 *
 * Key features.
 * - Designed for use in SVG tag/component classes requiring foreign content rendering.
 * - Standards-compliant implementation of the SVG `<foreignObject>` element.
 * - Supports opacity and transform attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/foreignObject
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ForeignObject extends Base\BaseSvgBlockTag
{
    use HasHeight;
    use HasOpacity;
    use HasTransform;
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<foreignObject>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<foreignObject>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::FOREIGN_OBJECT;
    }
}
