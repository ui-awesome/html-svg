<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tag;

use UIAwesome\Html\Interop\BlockInterface;

/**
 * Represents SVG block-level element names as enum cases.
 *
 * Provides the literal tag names for block-level SVG elements that implement {@see BlockInterface}.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Implements {@see BlockInterface} for contract adherence.
 * - Suitable for building SVG markup and element validation.
 * - Values map to SVG element tag names.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element
 * {@see BlockInterface} for contract details.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum SvgBlock: string implements BlockInterface
{
    /**
     * `<clipPath>` - Defines a clipping path.
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
     * `<filter>` - Container for filter effects.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/filter
     */
    case FILTER = 'filter';

    /**
     * `<foreignObject>` - Renders foreign content (such as XHTML).
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
     * `<linearGradient>` - Defines a linear gradient.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/linearGradient
     */
    case LINEAR_GRADIENT = 'linearGradient';

    /**
     * `<marker>` - Defines a marker for paths.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/marker
     */
    case MARKER = 'marker';

    /**
     * `<mask>` - Container for masking content.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/mask
     */
    case MASK = 'mask';

    /**
     * `<pattern>` - Defines a pattern.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/pattern
     */
    case PATTERN = 'pattern';

    /**
     * `<radialGradient>` - Radial gradient definition.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/radialGradient
     */
    case RADIAL_GRADIENT = 'radialGradient';

    /**
     * `<svg>` - Root container for SVG graphics.
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
     * `<text>` - SVG text content element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/text
     */
    case TEXT = 'text';
}
