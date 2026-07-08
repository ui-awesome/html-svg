<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `font-style` attribute.
 *
 * Provides the keyword values used by the `font-style` attribute.
 *
 * @see \UIAwesome\Html\Svg\Text::fontStyle()
 */
enum FontStyle: string
{
    /**
     * `italic` - Selects a font that is classified as `italic`.
     *
     * @see https://www.w3.org/TR/css-fonts-3/#font-style-prop
     */
    case ITALIC = 'italic';

    /**
     * `normal` - Selects a font that is classified as `normal`.
     *
     * @see https://www.w3.org/TR/css-fonts-3/#font-style-prop
     */
    case NORMAL = 'normal';

    /**
     * `oblique` - Selects a font that is classified as `oblique`.
     *
     * @see https://www.w3.org/TR/css-fonts-3/#font-style-prop
     */
    case OBLIQUE = 'oblique';
}
