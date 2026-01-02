<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tag;

use UIAwesome\Html\Core\Tag\BlockInterface;

/**
 * Represents standardized SVG block-level HTML element names as enum cases.
 *
 * Provides a type-safe set of SVG element tokens and concise documentation aligned with the MDN reference.
 *
 * Key features:
 * - Designed for use in helpers and components that need an explicit SVG element name.
 * - Implementation of {@see BlockInterface} for contract adherence.
 * - Suitable for building SVG markup and element validation.
 * - Values follow the SVG elements listed in the MDN documentation.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element
 * {@see BlockInterface} for contract details.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum SvgBlock: string implements BlockInterface
{
    /**
     * `<clipPath>` - Defines clipping path.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/clipPath
     */
    case CLIP_PATH = 'clipPath';

    /**
     * `<defs>` - Container for elements not rendered directly.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/defs
     */
    case DEFS = 'defs';

    /**
     * `<ellipse>` - SVG ellipse element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/ellipse
     */
    case ELLIPSE = 'ellipse';

    /**
     * `<filter>` - Filter effects container.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/filter
     */
    case FILTER = 'filter';

    /**
     * `<foreignObject>` - Renders foreign content (XHTML).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/foreignObject
     */
    case FOREIGN_OBJECT = 'foreignObject';

    /**
     * `<g>` - Groups SVG shapes together.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/g
     */
    case G = 'g';

    /**
     * `<image>` - Embeds bitmap images.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/image
     */
    case IMAGE = 'image';

    /**
     * `<line>` - SVG line element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/line
     */
    case LINE = 'line';

    /**
     * `<linearGradient>` - Linear gradient definition.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/linearGradient
     */
    case LINEAR_GRADIENT = 'linearGradient';

    /**
     * `<marker>` - Marker definition for paths.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/marker
     */
    case MARKER = 'marker';

    /**
     * `<mask>` - Masking container.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/mask
     */
    case MASK = 'mask';

    /**
     * `<path>` - Path element for complex shapes.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/path
     */
    case PATH = 'path';

    /**
     * `<pattern>` - Pattern definition.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/pattern
     */
    case PATTERN = 'pattern';

    /**
     * `<polygon>` - SVG polygon element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polygon
     */
    case POLYGON = 'polygon';

    /**
     * `<polyline>` - SVG polyline element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polyline
     */
    case POLYLINE = 'polyline';

    /**
     * `<radialGradient>` - Radial gradient definition.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/radialGradient
     */
    case RADIAL_GRADIENT = 'radialGradient';

    /**
     * `<rect>` - SVG rectangle element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/rect
     */
    case RECT = 'rect';

    /**
     * `<stop>` - Gradient stop element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/stop
     */
    case STOP = 'stop';

    /**
     * `<svg>` - The root container for SVG graphics.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg
     */
    case SVG = 'svg';

    /**
     * `<symbol>` - Reusable symbol definition.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/symbol
     */
    case SYMBOL = 'symbol';

    /**
     * `<use>` - Reference to reusable element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/use
     */
    case USE = 'use';
}
