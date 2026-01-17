<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<svg>` (svg) element for scalable vector graphics containers.
 *
 * Provides a concrete implementation of the SVG `<svg>` container element that returns `SvgBlock::SVG` and
 * inherits attribute traits from {@see Base\BaseSvg} for viewport, paint, and transform attributes.
 *
 * The `<svg>` element defines a new coordinate system and viewport for SVG graphics. It is used as the outermost
 * element of SVG documents, or to embed SVG fragments within HTML or SVG documents.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Moves the global `title` attribute into a `<title>` child when present.
 * - Supports file-based SVG injection via `filePath()` with sanitization and validation.
 * - Supports geometry and viewport attributes (`x`, `y`, `width`, `height`, `viewBox`).
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform and aspect ratio attributes (`transform`, `preserveAspectRatio`).
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg
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
