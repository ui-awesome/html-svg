<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for SVG coordinate system units.
 *
 * Provides a type-safe, standards-compliant set of values for use in SVG attributes that define coordinate systems,
 * ensuring consistency with SVG 2 and CSS Masking specifications.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring coordinate units assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of values for semantic markup generation and accessibility.
 * - Values follow SVG 2 and CSS Masking Module Level 1 specifications.
 *
 * @see \UIAwesome\Html\Svg\ClipPath::clipPathUnits()
 * @see \UIAwesome\Html\Svg\Filter::filterUnits()
 * @see \UIAwesome\Html\Svg\Filter::primitiveUnits()
 * @see \UIAwesome\Html\Svg\LinearGradient::gradientUnits()
 * @see \UIAwesome\Html\Svg\Mask::maskContentUnits()
 * @see \UIAwesome\Html\Svg\Mask::maskUnits()
 * @see \UIAwesome\Html\Svg\Pattern::patternContentUnits()
 * @see \UIAwesome\Html\Svg\Pattern::patternUnits()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum CoordinateUnits: string
{
    /**
     * `objectBoundingBox` - Coordinate system is established by the bounding box of the element to which the attribute
     * is applied.
     *
     * @link https://drafts.csswg.org/css-masking-1/#element-attrdef-clippath-clippathunits
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-maskcontentunits
     * @link https://www.w3.org/TR/filter-effects-1/#element-attrdef-filter-filterunits
     * @link https://www.w3.org/TR/filter-effects-1/#element-attrdef-filterprimitive-primitiveunits
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientUnitsAttribute
     * @link https://www.w3.org/TR/SVG2/pservers.html#RadialGradientElementGradientUnitsAttribute
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
