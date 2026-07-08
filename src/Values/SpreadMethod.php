<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `spreadMethod` attribute.
 *
 * Provides the keyword values used by the `spreadMethod` attribute.
 *
 * @see \UIAwesome\Html\Svg\LinearGradient::spreadMethod()
 */
enum SpreadMethod: string
{
    /**
     * `pad` - The final color of the gradient fills the shape beyond the gradient edges.
     *
     * @see https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     */
    case PAD = 'pad';

    /**
     * `reflect` - The gradient repeats in reverse beyond its edges.
     *
     * @see https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     */
    case REFLECT = 'reflect';

    /**
     * `repeat` - The gradient repeats in the original order beyond its edges.
     *
     * @see https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     */
    case REPEAT = 'repeat';
}
