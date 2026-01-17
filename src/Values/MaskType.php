<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `mask-type` attribute.
 *
 * Provides the keyword values used by the `mask-type` attribute.
 *
 * Key features.
 * - Designed for use in `<mask>` elements, components, and helpers requiring mask mode assignment.
 * - Can be used as an enum value in attribute assignment.
 * - Values map to `mask-type` keyword values.
 * - Useful for attribute assignment where a literal value is required.
 *
 * @see \UIAwesome\Html\Svg\Mask::maskType()
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum MaskType: string
{
    /**
     * `alpha` - Uses the alpha channel of the mask content.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-mask-type
     */
    case ALPHA = 'alpha';

    /**
     * `luminance` - Uses the luminance of the mask content.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-mask-type
     */
    case LUMINANCE = 'luminance';
}
