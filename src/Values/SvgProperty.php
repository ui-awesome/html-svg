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
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/svg
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum SvgProperty: string
{
    /**
     * `fill` - Fill attribute has two different meanings.
     *
     * For shapes and text it's a presentation attribute that defines the color (or any SVG paint servers like gradients
     * or patterns) used to paint the element; for animation it defines the final state of the animation.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/fill
     */
    case FILL = 'fill';

    /**
     * `fill-opacity` - Fill opacity attribute specifies the transparency of the fill paint.
     *
     * It defines the opacity level for the fill of the current element, with valid values ranging from 0.0 (fully
     * transparent) to '1.0' (fully opaque).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/fill-opacity
     */
    case FILL_OPACITY = 'fill-opacity';

    /**
     * `height` - Displayed height of the rectangular viewport (not the height of its coordinate system).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/height
     */
    case HEIGHT = 'height';

    /**
     * `opacity` - Opacity attribute specifies the transparency of an element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/opacity
     */
    case OPACITY = 'opacity';

    /**
     * `preserveAspectRatio` - Indicates how content with a `viewBox` must fit into a viewport with a different aspect
     * ratio.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/preserveAspectRatio
     */
    case PRESERVE_ASPECT_RATIO = 'preserveAspectRatio';

    /**
     * `stroke` - Stroke attribute is a presentation attribute defining the color (or any SVG paint servers like
     * gradients or patterns) used to paint the outline of the shape.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke
     */
    case STROKE = 'stroke';

    /**
     * `stroke-dasharray` - Stroke dasharray attribute is a presentation attribute defining the pattern of dashes and
     * gaps used to stroke paths.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke-dasharray
     */
    case STROKE_DASHARRAY = 'stroke-dasharray';

    /**
     * `stroke-linecap` - Stroke linecap attribute is a presentation attribute defining the shape to be used at the end
     * of open subpaths when they are stroked.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke-linecap
     */
    case STROKE_LINECAP = 'stroke-linecap';

    /**
     * `stroke-linejoin` - Stroke linejoin attribute is a presentation attribute defining the shape to be used at the
     * corners of paths or basic shapes when they are stroked.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke-linejoin
     */
    case STROKE_LINEJOIN = 'stroke-linejoin';

    /**
     * `stroke-width` - Stroke width attribute is a presentation attribute defining the width of the outline on the
     * current object.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke-width
     */
    case STROKE_WIDTH = 'stroke-width';

    /**
     * `title` - Provides an accessible, short-text description of any SVG container element or graphics element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/title
     */
    case TITLE = 'title';

    /**
     * `transform` - Transform attribute defines a list of transform definitions that are applied to an element and the
     * element's children.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/transform
     */
    case TRANSFORM = 'transform';

    /**
     * `viewBox` - Defines the position and dimension, in user space, of an SVG viewport.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/viewBox
     */
    case VIEW_BOX = 'viewBox';

    /**
     * `width` - Displayed width of the rectangular viewport (not the width of its coordinate system).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/width
     */
    case WIDTH = 'width';

    /**
     * `x` - Displayed x coordinate of the SVG container. No effect on outermost `svg` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/x
     */
    case X = 'x';

    /**
     * `xmlns` - XML namespace for the SVG element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Guides/Namespaces_crash_course
     */
    case XMLNS = 'xmlns';

    /**
     * `y` - Displayed y coordinate of the SVG container. No effect on outermost `svg` elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/y
     */
    case Y = 'y';
}
