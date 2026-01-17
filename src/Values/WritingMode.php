<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `writing-mode` attribute.
 *
 * Provides the keyword values used by the `writing-mode` attribute.
 *
 * Key features.
 * - Designed for use in text elements, components, and helpers requiring writing mode assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `writing-mode` keyword values.
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\Text::writingMode()
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
