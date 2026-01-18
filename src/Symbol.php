<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasOpacity,
    HasPreserveAspectRatio,
    HasRefX,
    HasRefY,
    HasTransform,
    HasViewBox,
    HasX,
    HasY,
};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<symbol>` element for reusable symbol definitions.
 *
 * Provides a concrete `<symbol>` element implementation that returns `SvgBlock::SYMBOL` and mixes in view, geometry,
 * reference point, and presentation attribute traits.
 *
 * The `<symbol>` element defines graphical template objects that can be instantiated with the `<use>` element.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports presentation attributes (`opacity`).
 * - Supports reference point attributes (`refX`, `refY`).
 * - Supports transform attribute (`transform`).
 * - Supports view attributes (`viewBox`, `preserveAspectRatio`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Symbol;
 *
 * echo Symbol::tag()
 *     ->id('icon-check')
 *     ->viewBox('0 0 16 16')
 *     ->content('<path d="M2 8l4 4 8-8" />')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/symbol
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Symbol extends Base\BaseSvgBlockTag
{
    use HasHeight;
    use HasOpacity;
    use HasPreserveAspectRatio;
    use HasRefX;
    use HasRefY;
    use HasTransform;
    use HasViewBox;
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<symbol>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<symbol>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::SYMBOL;
    }
}
