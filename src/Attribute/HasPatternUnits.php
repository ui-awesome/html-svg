<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Trait for managing the SVG `patternUnits` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `patternUnits` attribute on SVG `<pattern>`
 * elements.
 *
 * Intended for use in SVG tag and component classes that set pattern units.
 *
 * Key features.
 * - Designed for use in SVG `<pattern>` tag and component classes.
 * - Delegates to `addAttribute()` for the `patternUnits` attribute.
 * - Immutable method for setting or overriding the `patternUnits` attribute.
 * - Supports `string`, {@see CoordinateUnits} enum, and `null` for flexible coordinate system assignment (specific
 *   value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/patternUnits
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPatternUnits
{
    /**
     * Sets the SVG `patternUnits` attribute for the `<pattern>` element.
     *
     * Creates a new instance with the specified pattern units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Pattern units value (for example, `'objectBoundingBox'`,
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or `string`.
     *
     * @return static New instance with the updated `patternUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#PatternElementPatternUnitsAttribute
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->patternUnits('objectBoundingBox');
     * $element->patternUnits(CoordinateUnits::USER_SPACE_ON_USE);
     * $element->patternUnits(null);
     * ```
     */
    public function patternUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::PATTERN_UNITS);

        return $this->addAttribute(SvgAttribute::PATTERN_UNITS, $value);
    }
}
