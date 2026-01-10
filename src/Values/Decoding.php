<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG `decoding` attribute.
 *
 * Provides a type-safe, standards-compliant set of decoding hint identifiers for use in element rendering, attributes,
 * and view helpers, ensuring technical consistency with the HTML specification and modern web standards.
 *
 * Key features.
 * - Designed for use in image elements (img, SVG image) requiring decoding hint assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of decoding values for semantic markup generation and performance optimization.
 * - Values follow the HTML specification for decoding: `async`, `sync`, and `auto`.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Decoding: string
{
    /**
     * Decode the image asynchronously, after rendering and presenting the other content (`async`).
     *
     * The browser will render and present other content first, then decode the image and present it later.
     */
    case ASYNC = 'async';

    /**
     * No preference for the decoding mode (`auto`).
     *
     * The browser decides what is best for the user. This is the default value.
     */
    case AUTO = 'auto';

    /**
     * Decode the image synchronously along with rendering the other content (`sync`).
     *
     * The browser will decode the image along with rendering other content and present everything together.
     */
    case SYNC = 'sync';
}
