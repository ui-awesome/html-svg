<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\HasHref;
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasCx,
    HasCy,
    HasFr,
    HasFx,
    HasFy,
    HasGradientTransform,
    HasGradientUnits,
    HasOpacity,
    HasR,
    HasSpreadMethod,
};
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<radialGradient>` element for defining radial gradients.
 *
 * Provides a concrete `<radialGradient>` element implementation that returns `SvgBlock::RADIAL_GRADIENT` and mixes in
 * gradient and geometry attribute traits.
 *
 * The `<radialGradient>` element defines a radial gradient that can be referenced by `fill` and `stroke`.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports gradient attributes (`gradientUnits`, `gradientTransform`, `spreadMethod`, `href`).
 * - Supports opacity attribute.
 * - Supports radial gradient geometry attributes (`cx`, `cy`, `r`, `fx`, `fy`, `fr`).
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/radialGradient
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RadialGradient extends BaseSvgBlockTag
{
    use HasCx;
    use HasCy;
    use HasFr;
    use HasFx;
    use HasFy;
    use HasGradientTransform;
    use HasGradientUnits;
    use HasHref;
    use HasOpacity;
    use HasR;
    use HasSpreadMethod;

    /**
     * Returns the tag enumeration for the `<radialGradient>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<radialGradient>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::RADIAL_GRADIENT;
    }
}
