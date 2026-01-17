<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Trait for managing the SVG `maskContentUnits` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `maskContentUnits` attribute on SVG `<mask>`
 * elements.
 *
 * Intended for use in SVG tag and component classes that set mask content units.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `maskContentUnits` attribute.
 * - Designed for use in SVG `<mask>` tag and component classes.
 * - Immutable method for setting or overriding the `maskContentUnits` attribute.
 * - Supports `string`, {@see CoordinateUnits} enum, and `null` for flexible coordinate system assignment (specific
 *   value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/maskContentUnits
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMaskContentUnits
{
    /**
     * Sets the SVG `maskContentUnits` attribute for the `<mask>` element.
     *
     * Creates a new instance with the specified mask content units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Mask content units value (for example, `'userSpaceOnUse'`,
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or `string`.
     *
     * @return static New instance with the updated `maskContentUnits` attribute.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-maskcontentunits
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->maskContentUnits('userSpaceOnUse');
     * $element->maskContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * $element->maskContentUnits(null);
     * ```
     */
    public function maskContentUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::MASK_CONTENT_UNITS);

        return $this->addAttribute(SvgAttribute::MASK_CONTENT_UNITS, $value);
    }
}
