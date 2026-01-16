<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{MaskType, SvgAttribute};

/**
 * Trait for managing the SVG `mask-type` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `mask-type` attribute on SVG `<mask>` elements,
 * following the CSS Masking Module Level 1 specification for defining how mask content is interpreted.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the mask type,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG `<mask>` tag and component classes.
 * - Enforces standards-compliant handling of the SVG `mask-type` attribute.
 * - Immutable method for setting or overriding the `mask-type` attribute.
 * - Supports `string`, {@see MaskType} enum, and `null` for flexible mask type assignment (specific value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/mask-type
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMaskType
{
    /**
     * Sets the SVG `mask-type` attribute for the `<mask>` element.
     *
     * Creates a new instance with the specified mask type value, supporting explicit assignment according to the CSS
     * Masking Module Level 1 specification.
     *
     * @param MaskType|string|null $value Mask type value to set for the element. Accepts 'alpha', 'luminance',
     * {@see MaskType} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see MaskType} enum or `string`.
     *
     * @return static New instance with the updated `mask-type` attribute.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-mask-type
     * {@see MaskType} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->maskType('luminance');
     * $element->maskType(MaskType::ALPHA);
     * $element->maskType(null);
     * ```
     */
    public function maskType(MaskType|string|null $value): static
    {
        Validator::oneOf($value, MaskType::cases(), SvgAttribute::MASK_TYPE);

        return $this->addAttribute(SvgAttribute::MASK_TYPE, $value);
    }
}
