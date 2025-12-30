<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Core\Tag\BlockInterface;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * SVG `<defs>` element implementation for reusable graphical object definitions.
 *
 * Provides a concrete, type-safe implementation of the SVG `<defs>` element, designed to store graphical objects that
 * will be referenced and used at a later time without direct rendering.
 *
 * Designed for integration in view renderers, tag systems, and component libraries, ensuring consistent and
 * standards-compliant handling of SVG definition containers according to the SVG 2 specification.
 *
 * Key features.
 * - Container for reusable graphical objects (gradients, patterns, shapes, etc.).
 * - Immutable, stateless design for safe reuse in rendering engines.
 * - Standards-compliant rendering of the `<defs>` SVG element.
 * - Type-safe methods for content and attribute management.
 *
 * {@see https://developer.mozilla.org/en-US/docs/Web/SVG/Element/defs} The `<defs>` element is used to store graphical
 * objects that will be used at a later time. Objects created inside a `<defs>` element are not rendered directly.
 * {@see BaseSvgTag} for the base implementation.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Defs extends Base\BaseSvgTag
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
