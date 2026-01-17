<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<defs>` (defs) element for defining graphical object definitions.
 *
 * Provides a concrete `<defs>` element implementation that returns `SvgBlock::DEFS` and renders child definitions
 * without direct output.
 *
 * The `<defs>` element is used to store graphical objects that will be used at a later time. Objects created inside a
 * `<defs>` element are not rendered directly.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Content is not rendered directly.
 * - Defines reusable graphical objects (gradients, patterns, masks, etc.).
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/defs
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Defs extends Base\BaseSvgBlockTag
{
    /**
     * Returns the tag enumeration for the `<defs>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<defs>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::DEFS;
    }
}
