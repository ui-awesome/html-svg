<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasTransform, HasX, HasY};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<foreignObject>` (foreignObject) element for rendering foreign content.
 *
 * Provides a standards-compliant, immutable API for rendering the `<foreignObject>` container element, following SVG 2
 * and HTML specifications for embedding XHTML content.
 *
 * The `<foreignObject>` element allows embedding of external XHTML/XML content within SVG.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform attribute (`transform`).
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/foreignObject
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
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
