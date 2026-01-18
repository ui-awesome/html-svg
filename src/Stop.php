<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{HasOffset, HasStopColor, HasStopOpacity};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<stop>` element used for gradient color stops.
 *
 * Provides an API for rendering the `<stop>` element, following SVG 2 and HTML specifications for defining gradient
 * stops.
 *
 * The `<stop>` element specifies a color stop within a gradient.
 *
 * Key features.
 * - Supports gradient stop attributes (`offset`, `stop-color`, `stop-opacity`).
 * - Void element does not accept child elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/stop
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
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
