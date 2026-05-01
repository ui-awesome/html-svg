<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `fetchpriority` attribute.
 *
 * Provides the keyword values used by the `fetchpriority` attribute.
 *
 * Key features.
 * - Can be used as an enum value in attribute assignment.
 * - Designed for elements that can hint resource fetch priority.
 * - Values map to `fetchpriority` keyword values (`high`, `low`, `auto`).
 *
 * @see \UIAwesome\Html\Svg\Image::fetchpriority()
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
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
