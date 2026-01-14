<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG 2 `writing-mode` attribute.
 *
 * Provides a type-safe, standards-compliant set of writing mode values for use in SVG text element rendering,
 * attributes, and view helpers, ensuring technical consistency with the SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring writing mode assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `writing-mode` values for semantic markup generation and accessibility.
 * - Values follow the SVG 2 specification for `writing-mode` attribute.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/writing-mode
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum WritingMode: string
{
    /**
     * `horizontal-tb` - Horizontal writing mode, top to bottom.
     *
     * @link https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case HORIZONTAL_TB = 'horizontal-tb';

    /**
     * `sideways-lr` - Sideways writing mode, left to right (SVG2).
     *
     * @link https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case SIDEWAYS_LR = 'sideways-lr';

    /**
     * `sideways-rl` - Sideways writing mode, right to left (SVG2).
     *
     * @link https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case SIDEWAYS_RL = 'sideways-rl';

    /**
     * `vertical-lr` - Vertical writing mode, left to right.
     *
     * @link https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case VERTICAL_LR = 'vertical-lr';

    /**
     * `vertical-rl` - Vertical writing mode, right to left.
     *
     * @link https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case VERTICAL_RL = 'vertical-rl';
}
