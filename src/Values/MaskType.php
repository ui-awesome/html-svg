<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents literal string values for the SVG `mask-type` attribute.
 *
 * Provides the keyword values used by the `mask-type` attribute.
 *
 * @see \UIAwesome\Html\Svg\Mask::maskType()
 */
enum MaskType: string
{
    /**
     * `alpha` - Uses the alpha channel of the mask content.
     *
     * @see https://drafts.csswg.org/css-masking/#element-attrdef-mask-mask-type
     */
    case ALPHA = 'alpha';

    /**
     * `luminance` - Uses the luminance of the mask content.
     *
     * @see https://drafts.csswg.org/css-masking/#element-attrdef-mask-mask-type
     */
    case LUMINANCE = 'luminance';
}
