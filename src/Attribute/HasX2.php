<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `x2` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `x2` attribute on SVG elements, following the SVG 2
 * specification for defining the second x-axis coordinate of an element.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the second x-coordinate
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `x2` attribute.
 * - Immutable method for setting or overriding the `x2` attribute.
 * - Supports float, int, string and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/x2
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasX2
{
    /**
     * Sets the SVG `x2` attribute for the element.
     *
     * Creates a new instance with the specified second x-coordinate value, supporting explicit assignment according to
     * the SVG 2 specification for defining the second horizontal position of an element.
     *
     * @param float|int|string|null $value Second x coordinate value to set for the element. Accepts any valid SVG
     * length, percentage, or `null` to unset (for example, '10.3', '50', '10px', '50%', or `null`).
     *
     * @return static New instance with the updated `x2` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementX2Attribute
     *
     * Usage example:
     * ```php
     * // sets the `x2` attribute to 10 user units
     * $element->x2(10);
     *
     * // sets the `x2` attribute to 10.3 user units
     * $element->x2(10.3);
     *
     * // sets the `x2` attribute to a relative value
     * $element->x2('50%');
     *
     * // unsets the `x2` attribute
     * $element->x2(null);
     * ```
     */
    public function x2(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X2, $value);
    }
}
