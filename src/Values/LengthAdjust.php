<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `lengthAdjust` attribute.
 *
 * Provides a type-safe, standards-compliant set of length adjustment values for use in SVG text element rendering,
 * attributes, and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring length adjustment assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `lengthAdjust` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `lengthAdjust` attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/lengthAdjust
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum LengthAdjust: string
{
    /**
     * `spacing` - Adjusts only the spacing between glyphs.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     */
    case SPACING = 'spacing';

    /**
     * `spacingAndGlyphs` - Adjusts both spacing and glyph size.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     */
    case SPACING_AND_GLYPHS = 'spacingAndGlyphs';
}
