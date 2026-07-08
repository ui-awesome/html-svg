<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<defs>` (defs) element for defining graphical object definitions.
 *
 * Provides a concrete `<defs>` element implementation that returns {@see SvgBlock::DEFS} and renders child definitions
 * without direct output.
 *
 * The `<defs>` element is used to store graphical objects that will be used at a later time. Objects created inside a
 * `<defs>` element are not rendered directly.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Defs, LinearGradient, Stop};
 *
 * echo Defs::tag()
 *     ->content(
 *         LinearGradient::tag()
 *             ->id('accent')
 *             ->x1('0%')
 *             ->y1('0%')
 *             ->x2('100%')
 *             ->y2('0%')
 *             ->content(
 *                 Stop::tag()->offset('0%')->stopColor('#0ea5e9'),
 *                 Stop::tag()->offset('100%')->stopColor('#22c55e')
 *             )
 *     )
 *     ->render();
 * ```
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/SVG/Element/defs
 * {@see BaseSvgBlockTag} for the base implementation.
 */
final class Defs extends BaseSvgBlockTag
{
    /**
     * Returns the tag enumeration for the `<defs>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<defs>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::DEFS;
    }
}
