<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `decoding` attribute.
 *
 * Provides the keyword values used by the `decoding` attribute.
 *
 * Key features.
 * - Designed for use in image elements (img, SVG image) requiring decoding hint assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `decoding` keyword values (`async`, `sync`, `auto`).
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\Image::decoding()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Decoding: string
{
    /**
     * Decode the image asynchronously, after rendering and presenting the other content (`async`).
     *
     * The browser will render and present other content first, then decode the image and present it later.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content.html#dom-img-decoding
     */
    case ASYNC = 'async';

    /**
     * No preference for the decoding mode (`auto`).
     *
     * The browser decides what is best for the user. This is the default value.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content.html#dom-img-decoding
     */
    case AUTO = 'auto';

    /**
     * Decode the image synchronously along with rendering the other content (`sync`).
     *
     * The browser will decode the image along with rendering other content and present everything together.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content.html#dom-img-decoding
     */
    case SYNC = 'sync';
}
