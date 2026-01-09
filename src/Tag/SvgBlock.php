<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tag;

use UIAwesome\Html\Interop\BlockInterface;

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
     * `<svg>` - The root container for SVG graphics.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg
     */
    case SVG = 'svg';
}
