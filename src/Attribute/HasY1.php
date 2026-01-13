<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `y1` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `y1` attribute on SVG elements, following the SVG 2
 * specification for defining the first y-axis coordinate of an element.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the first y-coordinate
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `y1` attribute.
 * - Immutable method for setting or overriding the `y1` attribute.
 * - Supports float, int, string and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/y1
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasY1
{
    /**
     * Sets the SVG `y1` attribute for the element.
     *
     * Creates a new instance with the specified first y-coordinate value, supporting explicit assignment according to
     * the SVG 2 specification for defining the first vertical position of an element.
     *
     * @param float|int|string|null $value First y coordinate value to set for the element. Accepts any valid SVG
     * length, percentage, or `null` to unset (for example, '10.3', '50', '10px', '50%', or `null`).
     *
     * @return static New instance with the updated `y1` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementY1Attribute
     *
     * Usage example:
     * ```php
     * // sets the `y1` attribute to 10 user units
     * $element->y1(10);
     *
     * // sets the `y1` attribute to 10.3 user units
     * $element->y1(10.3);
     *
     * // sets the `y1` attribute to a relative value
     * $element->y1('50%');
     *
     * // unsets the `y1` attribute
     * $element->y1(null);
     * ```
     */
    public function y1(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y1, $value);
    }
}
