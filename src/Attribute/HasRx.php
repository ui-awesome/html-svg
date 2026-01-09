<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgProperty;

/**
 * Trait for managing the SVG `rx` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `rx` attribute on SVG elements, following the SVG 2
 * specification for defining the x-axis radius of an ellipse or the x-axis radius of rounded corners of a rectangle.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the x-axis radius
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `rx` attribute.
 * - Immutable method for setting or overriding the `rx` attribute.
 * - Supports float, int, string, and `null` for flexible radius assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/rx
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRx
{
    /**
     * Sets the SVG `rx` attribute for the element.
     *
     * Creates a new instance with the specified x-axis radius value, supporting explicit assignment according to the
     * SVG 2 specification for defining the horizontal radius of an ellipse or the horizontal radius of rounded corners
     * of a rectangle.
     *
     * @param float|int|string|null $value X-axis radius value to set for the element. Accepts any valid SVG length,
     * percentage, number, or `null` to unset (for example, '50', '10px', '50%', or `null`).
     *
     * @return static New instance with the updated `rx` attribute.
     *
     * @link https://svgwg.org/svg2-draft/geometry.html#RX
     *
     * Usage example:
     * ```php
     * // sets the `rx` attribute to 50 user units
     * $element->rx(50);
     *
     * // sets the `rx` attribute to a relative value
     * $element->rx('50%');
     *
     * // unsets the `rx` attribute
     * $element->rx(null);
     * ```
     */
    public function rx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgProperty::RX, $value);
    }
}
