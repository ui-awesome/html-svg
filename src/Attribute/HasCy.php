<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgProperty;

/**
 * Trait for managing the SVG `cy` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `cy` attribute on SVG elements, following the SVG 2
 * specification for defining the y-axis coordinate of the center of an element.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the center y-coordinate
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `cy` attribute.
 * - Immutable method for setting or overriding the `cy` attribute.
 * - Supports int, float, string, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/cy
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasCy
{
    /**
     * Sets the SVG `cy` attribute for the element.
     *
     * Creates a new instance with the specified center y-coordinate value, supporting explicit assignment according to
     * the SVG 2 specification for defining the vertical position of the center of an element such as a circle or
     * ellipse.
     *
     * @param float|int|string|null $value Center y-coordinate value to set for the element. Accepts any valid SVG
     * length, percentage, number, or `null` to unset (for example, '50', '10px', '50%', or `null`).
     *
     * @return static New instance with the updated `cy` attribute.
     *
     * @link https://svgwg.org/svg2-draft/geometry.html#CY
     *
     * Usage example:
     * ```php
     * // sets the `cy` attribute to 50 user units
     * $element->cy(50);
     *
     * // sets the `cy` attribute to a relative value
     * $element->cy('50%');
     *
     * // unsets the `cy` attribute
     * $element->cy(null);
     * ```
     */
    public function cy(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgProperty::CY, $value);
    }
}
