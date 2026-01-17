<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Element\{HasHeight, HasHref, HasWidth};
use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Interop\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasTransform, HasX, HasY};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * Represents the SVG `<use>` (use) element for referencing and reusing SVG fragments.
 *
 * Provides a concrete `<use>` element implementation that returns `SvgVoid::USES` and mixes in linking, geometry,
 * presentation, and transform attribute traits.
 *
 * The `<use>` element references an existing element and renders it at the specified location.
 *
 * Key features.
 * - Enables referencing of internal and external SVG fragments.
 * - Supports linking and geometry attributes (`href`, `x`, `y`, `width`, `height`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/use
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Uses extends BaseVoid
{
    use HasHeight;
    use HasHref;
    use HasOpacity;
    use HasTransform;
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Returns the tag enumeration for the `<use>` element.
     *
     * @return VoidInterface Tag enumeration instance for `<use>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): VoidInterface
    {
        return SvgVoid::USES;
    }
}
