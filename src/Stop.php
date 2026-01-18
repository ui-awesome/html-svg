<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{HasOffset, HasStopColor, HasStopOpacity};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<stop>` element for defining gradient stop positions and colors.
 *
 * Provides a concrete `<stop>` element implementation that returns `SvgVoid::STOP` and mixes in stop attribute traits.
 *
 * The `<stop>` element defines a color stop for gradients such as `<linearGradient>` and `<radialGradient>`.
 *
 * Key features.
 * - Supports stop attributes (`offset`, `stop-color`, `stop-opacity`).
 * - Void element. Does not accept child elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/stop
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Stop extends BaseVoid
{
    use HasOffset;
    use HasStopColor;
    use HasStopOpacity;

    /**
     * Returns the tag enumeration for the `<stop>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<stop>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::STOP;
    }
}
