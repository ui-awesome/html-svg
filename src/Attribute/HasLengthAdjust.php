<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{LengthAdjust, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing SVG `lengthAdjust` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `lengthAdjust` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set length adjustment values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `lengthAdjust` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `lengthAdjust` attribute.
 * - Supports `string`, {@see LengthAdjust} enum, and `null` for flexible length adjust assignment (specific value or
 *   unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/lengthAdjust
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasLengthAdjust
{
    /**
     * Sets SVG `lengthAdjust` attribute for the element.
     *
     * Creates a new instance with the specified length adjust value for the rendered element.
     *
     * @param LengthAdjust|string|null $value Length adjust value (for example, `spacing`,
     * {@see LengthAdjust} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see LengthAdjust} enum or `string`.
     *
     * @return static New instance with the updated `lengthAdjust` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     * {@see LengthAdjust} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->lengthAdjust('spacing');
     * $element->lengthAdjust(LengthAdjust::SPACING_AND_GLYPHS);
     * $element->lengthAdjust(null);
     * ```
     */
    public function lengthAdjust(LengthAdjust|string|null $value): static
    {
        Validator::oneOf($value, LengthAdjust::cases(), SvgAttribute::LENGTH_ADJUST);

        return $this->addAttribute(SvgAttribute::LENGTH_ADJUST, $value);
    }
}
