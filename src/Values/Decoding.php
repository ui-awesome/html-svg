<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `decoding` attribute.
 *
 * Provides the keyword values used by the `decoding` attribute.
 *
 * @see \UIAwesome\Html\Svg\Image::decoding()
 */
enum Decoding: string
{
    /**
     * Decode the image asynchronously, after rendering and presenting the other content (`async`).
     *
     * The browser will render and present other content first, then decode the image and present it later.
     *
     * @see https://html.spec.whatwg.org/multipage/embedded-content.html#dom-img-decoding
     */
    case ASYNC = 'async';

    /**
     * No preference for the decoding mode (`auto`).
     *
     * The browser decides what is best for the user. This is the default value.
     *
     * @see https://html.spec.whatwg.org/multipage/embedded-content.html#dom-img-decoding
     */
    case AUTO = 'auto';

    /**
     * Decode the image synchronously along with rendering the other content (`sync`).
     *
     * The browser will decode the image along with rendering other content and present everything together.
     *
     * @see https://html.spec.whatwg.org/multipage/embedded-content.html#dom-img-decoding
     */
    case SYNC = 'sync';
}
