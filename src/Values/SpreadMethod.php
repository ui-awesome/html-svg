<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `spreadMethod` attribute.
 *
 * Provides the keyword values used by the `spreadMethod` attribute.
 *
 * Key features.
 * - Designed for use in gradient elements, components, and helpers requiring spread method assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `spreadMethod` keyword values.
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\LinearGradient::spreadMethod()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum SpreadMethod: string
{
    /**
     * `pad` - The final color of the gradient fills the shape beyond the gradient edges.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     */
    case PAD = 'pad';

    /**
     * `reflect` - The gradient repeats in reverse beyond its edges.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     */
    case REFLECT = 'reflect';

    /**
     * `repeat` - The gradient repeats in the original order beyond its edges.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     */
    case REPEAT = 'repeat';
}
