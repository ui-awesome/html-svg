<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `stroke-linejoin` attribute.
 *
 * Provides a type-safe, standards-compliant set of stroke line join values for use in SVG element rendering,
 * attributes, and view helpers, ensuring technical consistency with the SVG specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring stroke line join assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of stroke-linejoin values for semantic markup generation and accessibility.
 * - Values follow the SVG specification for stroke-linejoin: `arcs`, `bevel`, `miter`, `miter-clip`, and `round`.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linejoin
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum StrokeLineJoin: string
{
    /**
     * `arcs` - Stroke is drawn using circular arcs to join segments.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linejoin
     */
    case ARCS = 'arcs';

    /**
     * `bevel` - Stroke is squared off at the join.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linejoin
     */
    case BEVEL = 'bevel';
    /**
     * `miter` - Stroke is extended to a sharp point.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linejoin
     */
    case MITER = 'miter';

    /**
     * `miter-clip` - Stroke is extended to a sharp point, but clipped to avoid excessively long miters.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linejoin
     */
    case MITER_CLIP = 'miter-clip';

    /**
     * `round` - Stroke is rounded at the join.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linejoin
     */
    case ROUND = 'round';
}
