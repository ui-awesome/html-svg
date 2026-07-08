<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `writing-mode` attribute.
 *
 * Provides the keyword values used by the `writing-mode` attribute.
 *
 * @see \UIAwesome\Html\Svg\Text::writingMode()
 */
enum WritingMode: string
{
    /**
     * `horizontal-tb` - Horizontal writing mode, top to bottom.
     *
     * @see https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case HORIZONTAL_TB = 'horizontal-tb';

    /**
     * `sideways-lr` - Sideways writing mode, left to right (SVG2).
     *
     * @see https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case SIDEWAYS_LR = 'sideways-lr';

    /**
     * `sideways-rl` - Sideways writing mode, right to left (SVG2).
     *
     * @see https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case SIDEWAYS_RL = 'sideways-rl';

    /**
     * `vertical-lr` - Vertical writing mode, left to right.
     *
     * @see https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case VERTICAL_LR = 'vertical-lr';

    /**
     * `vertical-rl` - Vertical writing mode, right to left.
     *
     * @see https://www.w3.org/TR/css-writing-modes-3/#block-flow
     */
    case VERTICAL_RL = 'vertical-rl';
}
