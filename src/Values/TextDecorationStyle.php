<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the CSS `text-decoration-style` property in SVG text decoration.
 *
 * Provides literal string values for the `text-decoration-style` keyword options.
 *
 * @see \UIAwesome\Html\Svg\Text::textDecoration()
 */
enum TextDecorationStyle: string
{
    /**
     * `dashed` - Draws a dashed line.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case DASHED = 'dashed';

    /**
     * `dotted` - Draws a dotted line.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case DOTTED = 'dotted';

    /**
     * `double` - Draws a double solid line.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case DOUBLE = 'double';

    /**
     * `solid` - Draws a single solid line (default).
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case SOLID = 'solid';

    /**
     * `wavy` - Draws a wavy line.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-style-property
     */
    case WAVY = 'wavy';
}
