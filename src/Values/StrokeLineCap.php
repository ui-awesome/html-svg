<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `stroke-linecap` attribute.
 *
 * Provides a type-safe, standards-compliant set of contenteditable identifiers for use in element rendering,
 * attributes, and view helpers, ensuring technical consistency with the HTML specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring stroke line cap assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of stroke-linecap values for semantic markup generation and accessibility.
 * - Values follow the SVG specification for stroke-linecap: `butt`, `round`, and `square`.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linecap
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum StrokeLineCap: string
{
    /**
     * `butt` - Stroke is squared off at the endpoint of the path. This is the default value.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linecap
     */
    case BUTT = 'butt';

    /**
     * `round` - Stroke is rounded at the endpoint of the path.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linecap
     */
    case ROUND = 'round';

    /**
     * `square` - Stroke continues beyond the endpoint of the path for a distance equal to half the stroke width.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linecap
     */
    case SQUARE = 'square';
}
