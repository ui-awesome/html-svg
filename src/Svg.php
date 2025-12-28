<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Core\Tag\Block;

/**
 * SVG `<svg>` element implementation for scalable vector graphics containers.
 *
 * Provides a concrete, type-safe implementation of the SVG `<svg>` element, supporting flexible content injection and
 * attribute management for advanced rendering scenarios.
 *
 * Designed for integration in view renderers, tag systems, and component libraries, ensuring consistent and
 * standards-compliant handling of SVG container elements according to the SVG specification.
 *
 * Key features.
 * - Immutable, stateless design for safe reuse in rendering engines.
 * - Standards-compliant rendering of the `<svg>` SVG element.
 * - Supports arbitrary SVG content and attribute sets.
 * - Type-safe methods for content and attribute management.
 *
 * {@see https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/svg} The `<svg>` element defines a new
 * coordinate system and viewport for SVG graphics. It is used as the outermost element of SVG documents, or to embed
 * SVG fragments within HTML or SVG documents.
 * {@see BaseSvg} for the base implementation.
 * {@see Block} for valid block-level tags.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Svg extends Base\BaseSvg
{
    /**
     * Returns the tag enumeration for the `<svg>` element.
     *
     * @return Block Tag enumeration instance for `<svg>`.
     */
    protected function getTag(): Block
    {
        return Block::SVG;
    }
}
