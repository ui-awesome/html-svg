<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `text-anchor` attribute.
 *
 * Provides a type-safe, standards-compliant set of text anchor values for use in SVG text element rendering,
 * attributes, and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring text anchor assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `text-anchor` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `text-anchor` attribute.
 *
 * @see \UIAwesome\Html\Svg\Text::textAnchor()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum TextAnchor: string
{
    /**
     * `end` - Text is aligned such that the end of the text is at the initial current text position.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     */
    case END = 'end';

    /**
     * `middle` - Text is aligned such that the middle of the text is at the initial current text position.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     */
    case MIDDLE = 'middle';

    /**
     * `start` - Text is aligned such that the start of the text is at the initial current text position.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     */
    case START = 'start';
}
