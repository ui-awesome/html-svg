<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the CSS `text-decoration-line` property in SVG text decoration.
 *
 * Provides literal string values for the `text-decoration-line` keyword options.
 *
 * @see \UIAwesome\Html\Svg\Text::textDecoration()
 */
enum TextDecorationLine: string
{
    /**
     * `blink` - Makes the text blink (alternates between visible and invisible).
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case BLINK = 'blink';

    /**
     * `grammar-error` - Indicates a grammatical error in the text.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case GRAMMAR_ERROR = 'grammar-error';

    /**
     * `line-through` - Each line of text has a line through the middle.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case LINE_THROUGH = 'line-through';

    /**
     * `none` - No text decoration is applied.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case NONE = 'none';

    /**
     * `overline` - Each line of text has a line above it.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case OVERLINE = 'overline';

    /**
     * `spelling-error` - Indicates a spelling error in the text.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case SPELLING_ERROR = 'spelling-error';

    /**
     * `underline` - Each line of text has a line beneath it.
     *
     * @see https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case UNDERLINE = 'underline';
}
