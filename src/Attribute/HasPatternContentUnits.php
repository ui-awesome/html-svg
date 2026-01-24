<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing the SVG `patternContentUnits` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `patternContentUnits` attribute on SVG `<pattern>`
 * elements.
 *
 * Intended for use in SVG tag and component classes that set pattern content units.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `patternContentUnits` attribute.
 * - Designed for use in SVG `<pattern>` tag and component classes.
 * - Immutable method for setting or overriding the `patternContentUnits` attribute.
 * - Supports `string`, {@see CoordinateUnits} enum, and `null` for flexible coordinate system assignment (specific
 *   value or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/patternContentUnits
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPatternContentUnits
{
    /**
     * Sets the SVG `patternContentUnits` attribute for the `<pattern>` element.
     *
     * Creates a new instance with the specified pattern content units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Pattern content units value (for example, `'userSpaceOnUse'`,
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or `string`.
     *
     * @return static New instance with the updated `patternContentUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#PatternElementPatternContentUnitsAttribute
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->patternContentUnits('userSpaceOnUse');
     * $element->patternContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * $element->patternContentUnits(null);
     * ```
     */
    public function patternContentUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::PATTERN_CONTENT_UNITS);

        return $this->addAttribute(SvgAttribute::PATTERN_CONTENT_UNITS, $value);
    }
}
