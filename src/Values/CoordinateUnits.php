<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for SVG coordinate system units.
 *
 * Provides a type-safe, standards-compliant set of values for use in SVG attributes that define coordinate systems,
 * ensuring consistency with SVG 2 and CSS Masking specifications.
 *
 * This enum can be used for.
 * - `clipPathUnits` on `<clipPath>` elements.
 * - `filterUnits` on `<filter>` elements.
 * - `primitiveUnits` on filter primitive elements (for example, `<feBlend>`, `<feGaussianBlur>`).
 *
 * Key features:
 * - Designed for use in tags, components, and helpers requiring coordinate units assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of values for semantic markup generation and accessibility.
 * - Values follow SVG 2 and CSS Masking Module Level 1 specifications.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/clipPathUnits
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/filterUnits
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/primitiveUnits
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum CoordinateUnits: string
{
    /**
     * `objectBoundingBox` - Coordinate system is established by the bounding box of the element to which the attribute
     * is applied.
     *
     * @link https://drafts.csswg.org/css-masking-1/#element-attrdef-clippath-clippathunits
     * @link https://www.w3.org/TR/filter-effects-1/#element-attrdef-filter-filterunits
     * @link https://www.w3.org/TR/filter-effects-1/#element-attrdef-filterprimitive-primitiveunits
     */
    case OBJECT_BOUNDING_BOX = 'objectBoundingBox';

    /**
     * `userSpaceOnUse` - Coordinate system is established by the current user coordinate system in place at the time of
     * reference.
     *
     * @link https://drafts.csswg.org/css-masking-1/#element-attrdef-clippath-clippathunits
     * @link https://www.w3.org/TR/filter-effects-1/#element-attrdef-filter-filterunits
     * @link https://www.w3.org/TR/filter-effects-1/#element-attrdef-filterprimitive-primitiveunits
     */
    case USER_SPACE_ON_USE = 'userSpaceOnUse';
}
