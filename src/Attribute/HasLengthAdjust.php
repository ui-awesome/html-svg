<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{LengthAdjust, SvgAttribute};

/**
 * Trait for managing SVG `lengthAdjust` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `lengthAdjust` attribute on SVG elements, following the SVG
 * 2 specification for text length adjustment properties.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of length adjust property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `lengthAdjust` attribute.
 * - Immutable method for setting or overriding the `lengthAdjust` attribute.
 * - Supports string, {@see LengthAdjust} enum, and `null` for flexible length adjust assignment (specific value or
 *   unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified length adjust value, supporting explicit assignment according to the
     * SVG 2 specification for text length adjustment properties.
     *
     * @param LengthAdjust|string|null $value Length adjust value to set for the element. Accepts `spacing`,
     * `spacingAndGlyphs`, {@see LengthAdjust} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see LengthAdjust} enum or string.
     *
     * @return static New instance with the updated `lengthAdjust` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementLengthAdjustAttribute
     * {@see LengthAdjust} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `lengthAdjust` attribute to 'spacing'
     * $element->lengthAdjust('spacing');
     *
     * // sets the `lengthAdjust` attribute using enum
     * $element->lengthAdjust(LengthAdjust::SPACING_AND_GLYPHS);
     *
     * // unsets the `lengthAdjust` attribute
     * $element->lengthAdjust(null);
     * ```
     */
    public function lengthAdjust(string|LengthAdjust|null $value): static
    {
        Validator::oneOf($value, LengthAdjust::cases(), SvgAttribute::LENGTH_ADJUST);

        return $this->addAttribute(SvgAttribute::LENGTH_ADJUST, $value);
    }
}
