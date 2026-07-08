<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `lengthAdjust` attribute.
 *
 * Provides the keyword values used by the `lengthAdjust` attribute.
 *
 * @see \UIAwesome\Html\Svg\Text::lengthAdjust()
 */
enum LengthAdjust: string
{
    /**
     * `spacing` - Adjusts only the spacing between glyphs.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     */
    case SPACING = 'spacing';

    /**
     * `spacingAndGlyphs` - Adjusts both spacing and glyph size.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     */
    case SPACING_AND_GLYPHS = 'spacingAndGlyphs';
}
