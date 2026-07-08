<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `text-anchor` attribute.
 *
 * Provides the keyword values used by the `text-anchor` attribute.
 *
 * @see \UIAwesome\Html\Svg\Text::textAnchor()
 */
enum TextAnchor: string
{
    /**
     * `end` - Text is aligned such that the end of the text is at the initial current text position.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     */
    case END = 'end';

    /**
     * `middle` - Text is aligned such that the middle of the text is at the initial current text position.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     */
    case MIDDLE = 'middle';

    /**
     * `start` - Text is aligned such that the start of the text is at the initial current text position.
     *
     * @see https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     */
    case START = 'start';
}
