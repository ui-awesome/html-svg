<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasTransform, HasX, HasY};
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<foreignObject>` (foreignObject) element for rendering foreign content.
 *
 * Provides a concrete `<foreignObject>` element implementation that returns `SvgBlock::FOREIGN_OBJECT` and mixes in
 * geometry, presentation, and transform attribute traits.
 *
 * The `<foreignObject>` element allows embedding external content within SVG.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform attribute (`transform`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\ForeignObject;
 *
 * $html = '<div xmlns="http://www.w3.org/1999/xhtml">Embedded HTML</div>';
 *
 * echo ForeignObject::tag()->x(0)->y(0)->width(200)->height(60)->content($html)->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/foreignObject
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ForeignObject extends BaseSvgBlockTag
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
