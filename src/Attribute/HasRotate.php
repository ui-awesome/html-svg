<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `rotate` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `rotate` attribute on SVG elements, following the SVG 2
 * specification for defining rotation values for individual glyphs.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the rotate property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `rotate` attribute.
 * - Immutable method for setting or overriding the `rotate` attribute.
 * - Supports float, int, string and `null` for flexible rotation assignment (single value, list, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/rotate
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRotate
{
    /**
     * Sets the SVG `rotate` attribute for the element.
     *
     * Creates a new instance with the specified rotation value, supporting explicit assignment according to the SVG 2
     * specification for defining rotation values for each glyph.
     *
     * @param float|int|string|null $value Rotate value to set for the element. Accepts any valid rotation angle or list
     * of angles, or `null` to unset (for example, '45', '10 20 30', or `null`).
     *
     * @return static New instance with the updated `rotate` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementRotateAttribute
     *
     * Usage example:
     * ```php
     * // sets the `rotate` attribute to 45 degrees
     * $element->rotate(45);
     *
     * // sets the `rotate` attribute to a list of rotation values
     * $element->rotate('10 20 30 40');
     *
     * // unsets the `rotate` attribute
     * $element->rotate(null);
     * ```
     */
    public function rotate(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::ROTATE, $value);
    }
}
