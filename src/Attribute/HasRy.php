<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `ry` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `ry` attribute on SVG elements, following the SVG 2
 * specification for defining the y-axis radius of an ellipse or the y-axis radius of rounded corners of a rectangle.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the y-axis
 * radius property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `ry` attribute.
 * - Immutable method for setting or overriding the `ry` attribute.
 * - Supports `int`, `float`, `string`, and `null` for flexible radius assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/ry
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRy
{
    /**
     * Sets the SVG `ry` attribute for the element.
     *
     * Creates a new instance with the specified y-axis radius value, supporting explicit assignment according to the
     * SVG 2 specification for defining the vertical radius of an ellipse or the vertical radius of rounded corners of a
     * rectangle.
     *
     * @param float|int|string|null $value Y-axis radius value (for example, `50`, `'10px'`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `ry` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#RY
     *
     * Usage example:
     * ```php
     * $element->ry(50);
     * $element->ry('50%');
     * $element->ry(null);
     * ```
     */
    public function ry(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::RY, $value);
    }
}
