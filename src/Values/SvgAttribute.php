<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized attribute names for the SVG `<svg>` element.
 *
 * Provides a type-safe set of attribute tokens and concise documentation aligned with the MDN reference.
 *
 * Key features.
 * - Designed for use in helpers and components that need an explicit `<svg>` attribute name.
 * - Suitable for building attribute arrays and rendering SVG markup.
 * - Values follow the `<svg>` attributes listed in the MDN documentation.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum SvgAttribute: string
{
    /**
     * `clipPathUnits` - Defines the coordinate system for the contents of the `<clipPath>` element.
     *
     * @link https://drafts.csswg.org/css-masking-1/#element-attrdef-clippath-clippathunits
     */
    case CLIP_PATH_UNITS = 'clipPathUnits';

    /**
     * `cx` - Center x-coordinate of a circle or ellipse element.
     *
     * Defines the horizontal position of the center point of the element in the current user coordinate system.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#CxProperty
     */
    case CX = 'cx';

    /**
     * `cy` - Center y-coordinate of a circle or ellipse element.
     *
     * Defines the vertical position of the center point of the element in the current user coordinate system.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#CyProperty
     */
    case CY = 'cy';

    /**
     * `dominant-baseline` - Dominant baseline positioning attribute.
     *
     * Specifies the baseline used to align the text content of an element with respect to its parent.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     */
    case DOMINANT_BASELINE = 'dominant-baseline';

    /**
     * `dx` - Horizontal offset for text positioning.
     *
     * Specifies a shift along the x-axis on the position of an element or its content.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementDXAttribute
     */
    case DX = 'dx';

    /**
     * `dy` - Vertical offset for text positioning.
     *
     * Specifies a shift along the y-axis on the position of an element or its content.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementDYAttribute
     */
    case DY = 'dy';

    /**
     * `fill` - Fill attribute has two different meanings.
     *
     * For shapes and text it's a presentation attribute that defines the color (or any SVG paint servers like gradients
     * or patterns) used to paint the element; for animation it defines the final state of the animation.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillProperties
     */
    case FILL = 'fill';

    /**
     * `fill-opacity` - Fill opacity attribute specifies the transparency of the fill paint.
     *
     * It defines the opacity level for the fill of the current element, with valid values ranging from '0.0' (fully
     * transparent) to '1.0' (fully opaque).
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillOpacity
     */
    case FILL_OPACITY = 'fill-opacity';

    /**
     * `fill-rule` - Fill rule attribute indicates which algorithm to use to determine the inside part of a shape.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#WindingRule
     */
    case FILL_RULE = 'fill-rule';

    /**
     * `filterUnits` - Defines the coordinate system for the contents of the `<filter>` element.
     *
     * @link https://drafts.csswg.org/filter-effects/#element-attrdef-filter-filterunits
     */
    case FILTER_UNITS = 'filterUnits';

    /**
     * `font-family` - Font family for text content.
     *
     * Specifies the font family to be used for rendering text.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-family-prop
     */
    case FONT_FAMILY = 'font-family';

    /**
     * `font-size` - Font size for text content.
     *
     * Specifies the size of the font from baseline to baseline.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-size-prop
     */
    case FONT_SIZE = 'font-size';

    /**
     * `font-style` - Font style for text content.
     *
     * Specifies whether the font should be styled with a 'normal', 'italic', or 'oblique' face.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-style-prop
     */
    case FONT_STYLE = 'font-style';

    /**
     * `font-weight` - Font weight for text content.
     *
     * Specifies the weight (or boldness) of the font.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-weight-prop
     */
    case FONT_WEIGHT = 'font-weight';

    /**
     * `gradientTransform` - Defines a transformation applied to the gradient coordinate system.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientTransformAttribute
     */
    case GRADIENT_TRANSFORM = 'gradientTransform';

    /**
     * `gradientUnits` - Defines the coordinate system for gradient attributes.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientUnitsAttribute
     */
    case GRADIENT_UNITS = 'gradientUnits';

    /**
     * `lengthAdjust` - Controls how text is stretched or compressed to fit the width defined by textLength.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     */
    case LENGTH_ADJUST = 'lengthAdjust';

    /**
     * `opacity` - Opacity attribute specifies the transparency of an element.
     *
     * @link https://www.w3.org/TR/SVG2/render.html#ObjectAndGroupOpacityProperties
     */
    case OPACITY = 'opacity';

    /**
     * `pathLength` - Specifies the total length for the path.
     *
     * Allows the author to specify a total length for the path in user units, which can be used for `stroke-dasharray`
     * animations and other length-based calculations. If provided, all length calculations for the path are scaled as
     * if the user coordinates along the path were mapped onto a range of '0' to `pathLength`.
     *
     * @link https://www.w3.org/TR/SVG2/paths.html#PathLengthAttribute
     */
    case PATH_LENGTH = 'pathLength';

    /**
     * `preserveAspectRatio` - Indicates how content with a `viewBox` must fit into a viewport with a different aspect
     * ratio.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#PreserveAspectRatioAttribute
     */
    case PRESERVE_ASPECT_RATIO = 'preserveAspectRatio';

    /**
     * `primitiveUnits` - Defines the coordinate system for the contents of filter primitive elements.
     *
     * @link https://drafts.csswg.org/filter-effects-1/#element-attrdef-filter-primitiveunits
     */
    case PRIMITIVE_UNITS = 'primitiveUnits';

    /**
     * `r` - Radius of a circle element.
     *
     * Defines the radius of the circle in the current user coordinate system.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#R
     */
    case R = 'r';

    /**
     * `rx` - The x-axis radius of the ellipse.
     *
     * Defines the radius along the x-axis of an `<ellipse>` element or the `x-axis` radius of rounded corners of a
     * `<rect>` element.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#RX
     */
    case RX = 'rx';

    /**
     * `ry` - The y-axis radius of the ellipse.
     *
     * Defines the radius along the y-axis of an `<ellipse>` element or the `y-axis` radius of rounded corners of a
     * `<rect>` element.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#RY
     */
    case RY = 'ry';

    /**
     * `spreadMethod` - Indicates how a gradient behaves if it starts or ends inside the bounds of the shape.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     */
    case SPREAD_METHOD = 'spreadMethod';

    /**
     * `stroke` - Stroke attribute is a presentation attribute defining the color (or any SVG paint servers like
     * gradients or patterns) used to paint the outline of the shape.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeProperty
     */
    case STROKE = 'stroke';

    /**
     * `stroke-dasharray` - Stroke dasharray attribute is a presentation attribute defining the pattern of dashes and
     * gaps used to stroke paths.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeDashing
     */
    case STROKE_DASHARRAY = 'stroke-dasharray';

    /**
     * `stroke-linecap` - Stroke linecap attribute is a presentation attribute defining the shape to be used at the end
     * of open subpaths when they are stroked.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeLinecapProperty
     */
    case STROKE_LINECAP = 'stroke-linecap';

    /**
     * `stroke-linejoin` - Stroke linejoin attribute is a presentation attribute defining the shape to be used at the
     * corners of paths or basic shapes when they are stroked.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeLinejoinProperty
     */
    case STROKE_LINEJOIN = 'stroke-linejoin';

    /**
     * `stroke-miterlimit` - Stroke miterlimit attribute is a presentation attribute defining a limit on the ratio of
     * the miter length to the stroke-width.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeMiterlimitProperty
     */
    case STROKE_MITERLIMIT = 'stroke-miterlimit';

    /**
     * `stroke-opacity` - Stroke opacity attribute specifies the transparency of the stroke paint.
     *
     * It defines the opacity level for the stroke of the current element, with valid values ranging from '0.0' (fully
     * transparent) to '1.0' (fully opaque).
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeOpacityProperty
     */
    case STROKE_OPACITY = 'stroke-opacity';

    /**
     * `stroke-width` - Stroke width attribute is a presentation attribute defining the width of the outline on the
     * current object.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeWidthProperty
     */
    case STROKE_WIDTH = 'stroke-width';

    /**
     * `transform` - Transform attribute defines a list of transform definitions that are applied to an element and the
     * element's children.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#TransformProperty
     */
    case TRANSFORM = 'transform';

    /**
     * `viewBox` - Defines the position and dimension, in user space, of an SVG viewport.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#ViewBoxAttribute
     */
    case VIEW_BOX = 'viewBox';

    /**
     * `x` - Displayed x coordinate of the SVG container. No effect on outermost `svg` elements.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#XProperty
     */
    case X = 'x';

    /**
     * `x1` - First x coordinate for drawing an SVG element.
     *
     * Specifies the first x-coordinate for drawing an SVG element that requires more than one coordinate. Used by
     * elements like `<line>` and `<linearGradient>`.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementX1Attribute
     */
    case X1 = 'x1';

    /**
     * `x2` - Second x coordinate for drawing an SVG element.
     *
     * Specifies the second x-coordinate for drawing an SVG element that requires more than one coordinate. Used by
     * elements like `<line>` and `<linearGradient>`.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementX2Attribute
     */
    case X2 = 'x2';

    /**
     * `xmlns` - XML namespace for the SVG element.
     *
     * @link https://www.w3.org/TR/SVG2/struct.html#Namespace
     */
    case XMLNS = 'xmlns';

    /**
     * `y` - Displayed y coordinate of the SVG container. No effect on outermost `svg` elements.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#YProperty
     */
    case Y = 'y';

    /**
     * `y1` - First y coordinate for drawing an SVG element.
     *
     * Specifies the first y-coordinate for drawing an SVG element that requires more than one coordinate. Used by
     * elements like `<line>` and `<linearGradient>`.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementY1Attribute
     */
    case Y1 = 'y1';

    /**
     * `y2` - Second y coordinate for drawing an SVG element.
     *
     * Specifies the second y-coordinate for drawing an SVG element that requires more than one coordinate. Used by
     * elements like `<line>` and `<linearGradient>`.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementY2Attribute
     */
    case Y2 = 'y2';
}
