<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `text-anchor` attribute.
 *
 * Provides the keyword values used by the `text-anchor` attribute.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring text anchor assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `text-anchor` keyword values.
 * - Useful for attribute assignment where a literal value is required.
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
