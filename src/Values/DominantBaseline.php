<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `dominant-baseline` attribute.
 *
 * Provides the keyword values used by the `dominant-baseline` attribute.
 *
 * @see \UIAwesome\Html\Svg\Text::dominantBaseline()
 */
enum DominantBaseline: string
{
    /**
     * `alphabetic` - Uses the alphabetic baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case ALPHABETIC = 'alphabetic';

    /**
     * `auto` - Uses the computed baseline for the script to which the character belongs.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case AUTO = 'auto';

    /**
     * `central` - Uses the central baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case CENTRAL = 'central';

    /**
     * `hanging` - Uses the hanging baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case HANGING = 'hanging';

    /**
     * `ideographic` - Uses the ideographic baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case IDEOGRAPHIC = 'ideographic';

    /**
     * `mathematical` - Uses the mathematical baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case MATHEMATICAL = 'mathematical';

    /**
     * `middle` - Uses the middle baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case MIDDLE = 'middle';

    /**
     * `text-bottom` - Uses the bottom of the em box as the baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case TEXT_BOTTOM = 'text-bottom';

    /**
     * `text-top` - Uses the top of the em box as the baseline.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case TEXT_TOP = 'text-top';
}
