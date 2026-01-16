<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Trait for managing the SVG `maskUnits` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `maskUnits` attribute on SVG `<mask>` elements,
 * following the CSS Masking Module Level 1 specification for defining the coordinate system used by x, y, width, and
 * height attributes.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the mask
 * coordinate system, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG `<mask>` tag and component classes.
 * - Enforces standards-compliant handling of the SVG `maskUnits` attribute.
 * - Immutable method for setting or overriding the `maskUnits` attribute.
 * - Supports `string`, {@see CoordinateUnits} enum, and `null` for flexible coordinate system assignment (specific
 *   value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/maskUnits
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMaskUnits
{
    /**
     * Sets the SVG `maskUnits` attribute for the `<mask>` element.
     *
     * Creates a new instance with the specified mask units value, supporting explicit assignment according to the CSS
     * Masking Module Level 1 specification.
     *
     * @param CoordinateUnits|string|null $value Mask units value (for example, `'objectBoundingBox'`,
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or `string`.
     *
     * @return static New instance with the updated `maskUnits` attribute.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-maskunits
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->maskUnits('objectBoundingBox');
     * $element->maskUnits(CoordinateUnits::USER_SPACE_ON_USE);
     * $element->maskUnits(null);
     * ```
     */
    public function maskUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::MASK_UNITS);

        return $this->addAttribute(SvgAttribute::MASK_UNITS, $value);
    }
}
