<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasGradientTransform, HasGradientUnits, HasSpreadMethod, HasX1, HasX2, HasY1, HasY2};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<linearGradient>` (linearGradient) element for defining linear gradients.
 *
 * Provides a concrete `<linearGradient>` element implementation that returns `SvgBlock::LINEAR_GRADIENT` and mixes in
 * gradient and coordinate attribute traits.
 *
 * The `<linearGradient>` element defines a linear gradient with coordinates and gradient attributes.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports gradient attributes (`gradientUnits`, `gradientTransform`, `spreadMethod`).
 * - Supports gradient geometry attributes (`x1`, `y1`, `x2`, `y2`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{LinearGradient, Stop};
 *
 * $stops = Stop::tag()->offset('0%')->stopColor('#0ea5e9')->stopOpacity(1)->render()
 *     . PHP_EOL
 *     . Stop::tag()->offset('100%')->stopColor('#1d4ed8')->stopOpacity(1)->render();
 *
 * echo LinearGradient::tag()
 *     ->id('accent')
 *     ->x1('0%')->y1('0%')->x2('100%')->y2('0%')
 *     ->content($stops)
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/linearGradient
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class LinearGradient extends Base\BaseSvgBlockTag
{
    use HasGradientTransform;
    use HasGradientUnits;
    use HasSpreadMethod;
    use HasX1;
    use HasX2;
    use HasY1;
    use HasY2;

    /**
     * Returns the tag enumeration for the `<linearGradient>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<linearGradient>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::LINEAR_GRADIENT;
    }
}
