<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Trait for managing the SVG `gradientUnits` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `gradientUnits` attribute on SVG gradient elements,
 * following the SVG 2 specification for gradient coordinate systems.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the gradient
 * units property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG gradient tag and component classes.
 * - Enforces standards-compliant handling of the SVG `gradientUnits` attribute.
 * - Immutable method for setting or overriding the `gradientUnits` attribute.
 * - Supports `string`, {@see CoordinateUnits} enum, and `null` for flexible gradient coordinate system assignment
 *   (specific value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/gradientUnits
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasGradientUnits
{
    /**
     * Sets the SVG `gradientUnits` attribute for the gradient element.
     *
     * Creates a new instance with the specified gradient units value, supporting explicit assignment according to the
     * SVG 2 specification for defining the coordinate system of gradient attributes.
     *
     * @param CoordinateUnits|string|null $value Gradient units value (for example, `'userSpaceOnUse'`,
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or `string`.
     *
     * @return static New instance with the updated `gradientUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientUnitsAttribute
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->gradientUnits('userSpaceOnUse');
     * $element->gradientUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * $element->gradientUnits(null);
     * ```
     */
    public function gradientUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::GRADIENT_UNITS);

        return $this->addAttribute(SvgAttribute::GRADIENT_UNITS, $value);
    }
}
