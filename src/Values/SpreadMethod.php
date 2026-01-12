<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `spreadMethod` attribute.
 *
 * Provides a type-safe, standards-compliant set of spread method values for use in SVG gradient element rendering,
 * attributes, and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in gradient elements, components, and helpers requiring spread method assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `spreadMethod` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `spreadMethod` attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/spreadMethod
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum SpreadMethod: string
{
    /**
     * `pad` - The final color of the gradient fills the shape beyond the gradient edges.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/spreadMethod
     */
    case PAD = 'pad';

    /**
     * `reflect` - The gradient repeats in reverse beyond its edges.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/spreadMethod
     */
    case REFLECT = 'reflect';

    /**
     * `repeat` - The gradient repeats in the original order beyond its edges.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/spreadMethod
     */
    case REPEAT = 'repeat';
}
