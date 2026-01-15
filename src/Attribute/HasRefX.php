<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `refX` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `refX` attribute on SVG marker elements, following the
 * SVG 2 specification for defining the x coordinate for the reference point of the marker.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the reference x
 * coordinate property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG marker tag and component classes.
 * - Enforces standards-compliant handling of the SVG `refX` attribute.
 * - Immutable method for setting or overriding the `refX` attribute.
 * - Supports float, int, string and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/refX
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRefX
{
    /**
     * Sets the SVG `refX` attribute for the marker element.
     *
     * Creates a new instance with the specified reference x coordinate value, supporting explicit assignment according
     * to the SVG 2 specification for defining the horizontal position of the marker's reference point.
     *
     * @param float|int|string|null $value Reference x coordinate value to set for the element. Accepts any valid SVG
     * length, percentage, or `null` to unset (for example, '0', '50%', '1.5', or `null`).
     *
     * @return static New instance with the updated `refX` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementRefXAttribute
     *
     * Usage example:
     * ```php
     * // sets the `refX` attribute to 0 user units
     * $element->refX(0);
     *
     * // sets the `refX` attribute to a percentage
     * $element->refX('50%');
     *
     * // unsets the `refX` attribute
     * $element->refX(null);
     * ```
     */
    public function refX(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::REF_X, $value);
    }
}
