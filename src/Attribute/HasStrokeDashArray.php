<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `stroke-dasharray` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `stroke-dasharray` attribute on SVG elements, following
 * the SVG 2 specification for controlling the pattern of dashes and gaps used to render the outline of shapes and text
 * content elements.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the stroke dash array
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `stroke-dasharray` attribute.
 * - Immutable method for setting or overriding the `stroke-dasharray` attribute.
 * - Supports int, float, string, and `null` for flexible dash pattern assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-dasharray
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeDashArray
{
    /**
     * Sets the SVG `stroke-dasharray` attribute for the element.
     *
     * Creates a new instance with the specified dash array value, supporting explicit assignment according to the SVG 2
     * specification for controlling the dash and gap pattern of the outline painted for shapes and text content
     * elements.
     *
     * @param float|int|string|null $value Dash array value to set for the element. Accepts any valid SVG dash pattern,
     * number, length, or `null` to unset (for example, '5.3', 4, or `null`).
     *
     * @return static New instance with the updated `stroke-dasharray` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeDashing
     *
     * Usage example:
     * ```php
     * // sets the `stroke-dasharray` attribute to 5.3
     * $element->strokeDashArray(5.3);
     *
     * // sets the `stroke-dasharray` attribute to 4 user units
     * $element->strokeDashArray(4);
     *
     * // unsets the `stroke-dasharray` attribute
     * $element->strokeDashArray(null);
     * ```
     */
    public function strokeDashArray(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE_DASHARRAY, $value);
    }
}
