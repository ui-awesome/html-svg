<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `fetchpriority` attribute.
 *
 * Provides the keyword values used by the `fetchpriority` attribute.
 *
 * @see \UIAwesome\Html\Svg\Image::fetchpriority()
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority
 */
enum Fetchpriority: string
{
    /**
     * Does not set a preference for the fetch priority (`auto`).
     */
    case AUTO = 'auto';

    /**
     * Fetches the resource at a high priority relative to other resources (`high`).
     */
    case HIGH = 'high';

    /**
     * Fetches the resource at a low priority relative to other resources (`low`).
     */
    case LOW = 'low';
}
