<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `font-style` attribute.
 *
 * Provides a type-safe, standards-compliant set of font style values for use in SVG text element rendering, attributes,
 * and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring font style assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `font-style` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `font-style` attribute.
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
