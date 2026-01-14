<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<svg>` (svg) element for scalable vector graphics containers.
 *
 * Provides a concrete, type-safe implementation of the SVG `<svg>` container element, supporting flexible content
 * injection and attribute management for advanced rendering scenarios.
 *
 * The `<svg>` element defines a new coordinate system and viewport for SVG graphics. It is used as the outermost
 * element of SVG documents, or to embed SVG fragments within HTML or SVG documents.
 *
 * Key features.
 * - Immutable, stateless design for safe reuse in rendering engines.
 * - Standards-compliant rendering of the `<svg>` SVG element.
 * - Supports arbitrary SVG content and attribute sets.
 * - Type-safe methods for content and attribute management.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/svg
 * {@see Base\BaseSvg} for the base implementation.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Svg extends Base\BaseSvg
{
    /**
     * Returns the tag enumeration for the `<svg>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<svg>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::SVG;
    }
}
