<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for SVG 2 `fill-rule` attribute.
 *
 * Provides a type-safe, standards-compliant set of fill rule values for use in SVG element rendering, attributes, and
 * view helpers, ensuring technical consistency with SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring fill rule assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of fill-rule values for semantic markup generation and accessibility.
 * - Values follow SVG 2 specification for fill-rule: `nonzero` and `evenodd`.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fill-rule
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum FillRule: string
{
    /**
     * `evenodd` - This value determines the "insideness" of a point on the canvas by drawing a ray from that point to
     * infinity in any direction and counting the number of path segments from the given shape that the ray crosses.
     *
     * If this number is odd, the point is inside; if even, the point is outside.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fill-rule
     */
    case EVENODD = 'evenodd';

    /**
     * `nonzero` - This value determines the "insideness" of a point on the canvas by drawing a ray from that point to
     * infinity in any direction and counting the number of path segments from the given shape that the ray crosses.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fill-rule
     */
    case NONZERO = 'nonzero';
}
