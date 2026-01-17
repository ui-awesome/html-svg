<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `dominant-baseline` attribute.
 *
 * Provides the keyword values used by the `dominant-baseline` attribute.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring baseline alignment assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `dominant-baseline` keyword values.
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\Text::dominantBaseline()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum DominantBaseline: string
{
    /**
     * `alphabetic` - Uses the alphabetic baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case ALPHABETIC = 'alphabetic';

    /**
     * `auto` - Uses the computed baseline for the script to which the character belongs.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case AUTO = 'auto';

    /**
     * `central` - Uses the central baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case CENTRAL = 'central';

    /**
     * `hanging` - Uses the hanging baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case HANGING = 'hanging';

    /**
     * `ideographic` - Uses the ideographic baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case IDEOGRAPHIC = 'ideographic';

    /**
     * `mathematical` - Uses the mathematical baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case MATHEMATICAL = 'mathematical';

    /**
     * `middle` - Uses the middle baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case MIDDLE = 'middle';

    /**
     * `text-bottom` - Uses the bottom of the em box as the baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case TEXT_BOTTOM = 'text-bottom';

    /**
     * `text-top` - Uses the top of the em box as the baseline.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case TEXT_TOP = 'text-top';
}
