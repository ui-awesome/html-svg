<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tag;

use UIAwesome\Html\Core\Tag\VoidInterface;

/**
 * Represents standardized SVG void (self-closing) HTML element names as enum cases.
 *
 * Provides a type-safe set of SVG void element tokens for use in helpers and components that require explicit SVG
 * element names.
 *
 * Key features:
 * - Designed for SVG elements that do not contain child elements (void elements).
 * - Implementation of {@see VoidInterface} for contract adherence.
 * - Suitable for SVG markup generation and element validation.
 * - Values correspond to SVG elements as defined in the MDN documentation.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element
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
     * `<ellipse>` - SVG ellipse element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/ellipse
     */
    case ELLIPSE = 'ellipse';

    /**
     * `<use>` - Reuses an existing SVG element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/use
     */
    case USES = 'use';
}
