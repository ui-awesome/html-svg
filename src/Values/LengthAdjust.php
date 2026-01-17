<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `lengthAdjust` attribute.
 *
 * Provides the keyword values used by the `lengthAdjust` attribute.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring length adjustment assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `lengthAdjust` keyword values.
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\Text::lengthAdjust()
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
