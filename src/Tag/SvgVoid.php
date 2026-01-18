<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tag;

use UIAwesome\Html\Interop\VoidInterface;

/**
 * Represents SVG void (self-closing) element names as enum cases.
 *
 * Provides the literal tag names for SVG void elements that implement {@see VoidInterface}.
 *
 * Key features.
 * - Implements {@see VoidInterface} for contract adherence.
 * - Suitable for SVG markup generation and element validation.
 * - Values map to SVG element tag names.
 * - Void element does not accept child elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element
 * {@see VoidInterface} for contract details.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum SvgVoid: string implements VoidInterface
{
    /**
     * `<circle>` - Draws a circle based on a center point and radius.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/circle
     */
    case CIRCLE = 'circle';

    /**
     * `<ellipse>` - Draws an ellipse based on a center point and two radii.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/ellipse
     */
    case ELLIPSE = 'ellipse';

    /**
     * `<image>` - Embeds bitmap images.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/image
     */
    case IMAGE = 'image';

    /**
     * `<line>` - Draws a straight line between two points.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/line
     */
    case LINE = 'line';

    /**
     * `<path>` - Draws a path using commands.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/path
     */
    case PATH = 'path';

    /**
     * `<polygon>` - Draws a closed shape with straight lines.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polygon
     */
    case POLYGON = 'polygon';

    /**
     * `<polyline>` - Draws a series of connected straight lines.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/polyline
     */
    case POLYLINE = 'polyline';

    /**
     * `<rect>` - Draws a rectangle.
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
     * `<use>` - Reuses an existing SVG element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/use
     */
    case USES = 'use';
}
