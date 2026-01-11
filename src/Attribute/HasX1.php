<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `x1` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `x1` attribute on SVG elements, following the SVG 2
 * specification for defining the first x-axis coordinate of an element.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the first x-coordinate
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `x1` attribute.
 * - Immutable method for setting or overriding the `x1` attribute.
 * - Supports float, int, string and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/x1
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasX1
{
    /**
     * Sets the SVG `x1` attribute for the element.
     *
     * Creates a new instance with the specified first x-coordinate value, supporting explicit assignment according to
     * the SVG 2 specification for defining the first horizontal position of an element.
     *
     * @param float|int|string|null $value First x coordinate value to set for the element. Accepts any valid SVG
     * length, percentage, or `null` to unset (for example, '10.3', '50', '10px', '50%', or `null`).
     *
     * @return static New instance with the updated `x1` attribute.
     *
     * @link https://svgwg.org/svg2-draft/shapes.html#LineElementX1Attribute
     *
     * Usage example:
     * ```php
     * // sets the `x1` attribute to 10 user units
     * $element->x1(10);
     *
     * // sets the `x1` attribute to 10.3 user units
     * $element->x1(10.3);
     *
     * // sets the `x1` attribute to a relative value
     * $element->x1('50%');
     *
     * // unsets the `x1` attribute
     * $element->x1(null);
     * ```
     */
    public function x1(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X1, $value);
    }
}
