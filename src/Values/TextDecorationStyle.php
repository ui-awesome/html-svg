<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the CSS `text-decoration-style` property in SVG text decoration.
 *
 * Provides a type-safe, standards-compliant set of text decoration style values for use in SVG text element rendering,
 * attributes, and view helpers, ensuring technical consistency with CSS and SVG specifications.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring text decoration style assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `text-decoration-style` values for semantic markup generation.
 * - Values follow the CSS Text Decoration specification.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/CSS/text-decoration-style
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum TextDecorationStyle: string
{
    /**
     * `dashed` - Draws a dashed line.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case DASHED = 'dashed';

    /**
     * `dotted` - Draws a dotted line.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case DOTTED = 'dotted';

    /**
     * `double` - Draws a double solid line.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case DOUBLE = 'double';

    /**
     * `solid` - Draws a single solid line (default).
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case SOLID = 'solid';

    /**
     * `wavy` - Draws a wavy line.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case WAVY = 'wavy';
}
