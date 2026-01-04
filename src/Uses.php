<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Attribute\Link\HasHref;
use UIAwesome\Html\Attribute\Media\{HasHeight, HasWidth};
use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Core\Tag\VoidInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasTransform, HasX, HasY};
use UIAwesome\Html\Svg\Tag\SvgVoid;

/**
 * SVG `<use>` element implementation for referencing and reusing SVG fragments.
 *
 * Provides a concrete, type-safe implementation of the SVG `<use>` element, enabling the reuse of defined SVG graphical
 * objects via references, according to the SVG 2 specification.
 *
 * Designed for integration in view renderers, tag systems, and component libraries, ensuring consistent and
 * standards-compliant handling of SVG reuse elements.
 *
 * Key features.
 * - Immutable, stateless design for safe reuse in rendering engines.
 * - Standards-compliant rendering of the `<use>` SVG element.
 * - Supports referencing internal and external SVG fragments.
 * - Type-safe methods for attribute management.
 *
 * {@see https://developer.mozilla.org/en-US/docs/Web/SVG/Element/use} The `<use>` element takes nodes from within the
 * SVG document, and duplicates them somewhere else. The effect is the same as if the nodes were deeply cloned into a
 * new location.
 * {@see BaseVoid} for the base implementation.
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
