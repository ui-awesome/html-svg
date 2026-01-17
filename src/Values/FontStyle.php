<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `font-style` attribute.
 *
 * Provides the keyword values used by the `font-style` attribute.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring font style assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `font-style` keyword values.
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\Text::fontStyle()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum FontStyle: string
{
    /**
     * `italic` - Selects a font that is classified as `italic`.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-style-prop
     */
    case ITALIC = 'italic';

    /**
     * `normal` - Selects a font that is classified as `normal`.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-style-prop
     */
    case NORMAL = 'normal';

    /**
     * `oblique` - Selects a font that is classified as `oblique`.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-style-prop
     */
    case OBLIQUE = 'oblique';
}
