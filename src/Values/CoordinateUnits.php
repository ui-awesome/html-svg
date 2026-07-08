<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for SVG coordinate system units.
 *
 * Provides the keyword values used by attributes that define coordinate systems.
 *
 * @see \UIAwesome\Html\Svg\ClipPath::clipPathUnits()
 * @see \UIAwesome\Html\Svg\Filter::filterUnits()
 * @see \UIAwesome\Html\Svg\Filter::primitiveUnits()
 * @see \UIAwesome\Html\Svg\LinearGradient::gradientUnits()
 * @see \UIAwesome\Html\Svg\Mask::maskContentUnits()
 * @see \UIAwesome\Html\Svg\Mask::maskUnits()
 * @see \UIAwesome\Html\Svg\Pattern::patternContentUnits()
 * @see \UIAwesome\Html\Svg\Pattern::patternUnits()
 */
enum CoordinateUnits: string
{
    /**
     * `objectBoundingBox` - Coordinate system is established by the bounding box of the element to which the attribute
     * is applied.
     *
     * @see https://drafts.csswg.org/css-masking-1/#element-attrdef-clippath-clippathunits
     * @see https://drafts.csswg.org/css-masking/#element-attrdef-mask-maskcontentunits
     * @see https://www.w3.org/TR/filter-effects-1/#element-attrdef-filter-filterunits
     * @see https://www.w3.org/TR/filter-effects-1/#element-attrdef-filterprimitive-primitiveunits
     * @see https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientUnitsAttribute
     * @see https://www.w3.org/TR/SVG2/pservers.html#RadialGradientElementGradientUnitsAttribute
     */
    case OBJECT_BOUNDING_BOX = 'objectBoundingBox';

    /**
     * `userSpaceOnUse` - Coordinate system is established by the current user coordinate system in place at the time of
     * reference.
     *
     * @see https://drafts.csswg.org/css-masking-1/#element-attrdef-clippath-clippathunits
     * @see https://www.w3.org/TR/filter-effects-1/#element-attrdef-filter-filterunits
     * @see https://www.w3.org/TR/filter-effects-1/#element-attrdef-filterprimitive-primitiveunits
     */
    case USER_SPACE_ON_USE = 'userSpaceOnUse';
}
