<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `y` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `y` attribute on SVG elements, following the SVG 2
 * specification for defining the y-axis coordinate of an element.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the y-coordinate
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `y` attribute.
 * - Immutable method for setting or overriding the `y` attribute.
 * - Supports float, int, string and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/y
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasY
{
    /**
     * Sets the SVG `y` attribute for the element.
     *
     * Creates a new instance with the specified y-coordinate value, supporting explicit assignment according to the SVG
     * 2 specification for defining the vertical position of an element.
     *
     * @param float|int|string|null $value Y coordinate value to set for the element. Accepts any valid SVG length,
     * percentage, or `null` to unset (for example, '10.3', '50', '10px', '50%', or `null`).
     *
     * @return static New instance with the updated `y` attribute.
     *
     * @link https://svgwg.org/svg2-draft/geometry.html#YProperty
     *
     * Usage example:
     * ```php
     * // sets the `y` attribute to 20 user units
     * $element->y(20);
     *
     * // sets the `y` attribute to 10.3 user units
     * $element->y(10.3);
     *
     * // sets the `y` attribute to a relative value
     * $element->y('50%');
     *
     * // unsets the `y` attribute
     * $element->y(null);
     * ```
     */
    public function y(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y, $value);
    }
}
