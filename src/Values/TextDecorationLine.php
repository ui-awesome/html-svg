<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the CSS `text-decoration-line` property in SVG text decoration.
 *
 * Provides a type-safe, standards-compliant set of text decoration line values for use in SVG text element rendering,
 * attributes, and view helpers, ensuring technical consistency with CSS and SVG specifications.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring text decoration line assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `text-decoration-line` values for semantic markup generation.
 * - Values follow the CSS Text Decoration specification.
 *
 * @see \UIAwesome\Html\Svg\Text::textDecoration()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum TextDecorationLine: string
{
    /**
     * `blink` - Makes the text blink (alternates between visible and invisible).
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case BLINK = 'blink';

    /**
     * `grammar-error` - Indicates a grammatical error in the text.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case GRAMMAR_ERROR = 'grammar-error';

    /**
     * `line-through` - Each line of text has a line through the middle.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case LINE_THROUGH = 'line-through';

    /**
     * `none` - No text decoration is applied.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case NONE = 'none';

    /**
     * `overline` - Each line of text has a line above it.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case OVERLINE = 'overline';

    /**
     * `spelling-error` - Indicates a spelling error in the text.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case SPELLING_ERROR = 'spelling-error';

    /**
     * `underline` - Each line of text has a line beneath it.
     *
     * @link https://www.w3.org/TR/css-text-decor-3/#text-decoration-line-property
     */
    case UNDERLINE = 'underline';
}
