<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for the SVG `mask-type` attribute.
 *
 * Provides a type-safe, standards-compliant set of values for use in SVG `<mask>` element rendering, ensuring
 * consistency with the CSS Masking Module Level 1 specification.
 *
 * Key features.
 * - Designed for use in `<mask>` elements, components, and helpers requiring mask mode assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `mask-type` values for semantic markup generation.
 * - Values follow the CSS Masking Module Level 1 specification for the `<mask>` element.
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
