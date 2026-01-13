<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `dominant-baseline` attribute.
 *
 * Provides a type-safe, standards-compliant set of dominant baseline values for use in SVG text element rendering,
 * attributes, and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring baseline alignment assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `dominant-baseline` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `dominant-baseline` attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/dominant-baseline
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
