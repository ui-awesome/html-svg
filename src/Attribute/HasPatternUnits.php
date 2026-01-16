<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Trait for managing the SVG `patternUnits` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `patternUnits` attribute on SVG `<pattern>` elements,
 * following the SVG 2 specification for defining the coordinate system used by the pattern tile.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the pattern coordinate
 * system, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG `<pattern>` tag and component classes.
 * - Enforces standards-compliant handling of the SVG `patternUnits` attribute.
 * - Immutable method for setting or overriding the `patternUnits` attribute.
 * - Supports string, {@see CoordinateUnits} enum, and `null` for flexible coordinate system assignment (specific value
 *   or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/patternUnits
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPatternUnits
{
    /**
     * Sets the SVG `patternUnits` attribute for the `<pattern>` element.
     *
     * Creates a new instance with the specified pattern units value, supporting explicit assignment according to the
     * SVG 2 specification.
     *
     * @param CoordinateUnits|string|null $value Pattern units value to set for the element. Accepts 'userSpaceOnUse',
     * 'objectBoundingBox', {@see CoordinateUnits} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `patternUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#PatternElementPatternUnitsAttribute
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `patternUnits` attribute to 'objectBoundingBox'
     * $element->patternUnits('objectBoundingBox');
     *
     * // sets the `patternUnits` attribute using an enum
     * $element->patternUnits(CoordinateUnits::USER_SPACE_ON_USE);
     *
     * // unsets the `patternUnits` attribute
     * $element->patternUnits(null);
     * ```
     */
    public function patternUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::PATTERN_UNITS);

        return $this->addAttribute(SvgAttribute::PATTERN_UNITS, $value);
    }
}
