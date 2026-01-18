<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasDecoding, HasHeight, HasHref, HasWidth};
use UIAwesome\Html\Attribute\HasFetchpriority;
use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasPreserveAspectRatio, HasTransform, HasX, HasY};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<image>` (image) element for embedding bitmap images.
 *
 * Provides a concrete `<image>` element implementation that returns `SvgVoid::IMAGE` and mixes in linking, geometry,
 * presentation, and transform attribute traits.
 *
 * The `<image>` element embeds an external image into the SVG.
 *
 * Key features.
 * - Supports image-specific attributes (`decoding`, `fetchpriority`).
 * - Supports linking and geometry attributes (`href`, `x`, `y`, `width`, `height`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform and aspect ratio attributes (`transform`, `preserveAspectRatio`).
 * - Void element does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Image;
 *
 * echo Image::tag()
 *     ->href('https://example.com/image.png')
 *     ->x(0)->y(0)->width(200)->height(200)
 *     ->opacity(0.9)
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/image
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Image extends BaseVoid
{
    use HasDecoding;
    use HasFetchpriority;
    use HasHeight;
    use HasHref;
    use HasOpacity;
    use HasPreserveAspectRatio;
    use HasTransform;
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<image>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<image>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::IMAGE;
    }
}
