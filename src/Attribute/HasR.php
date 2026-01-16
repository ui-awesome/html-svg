<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `r` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `r` attribute on SVG elements, following the SVG 2
 * specification for defining the radius of an element.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the radius
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `r` attribute.
 * - Immutable method for setting or overriding the `r` attribute.
 * - Supports `int`, `float`, `string`, and `null` for flexible radius assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/r
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasR
{
    /**
     * Sets the SVG `r` attribute for the element.
     *
     * Creates a new instance with the specified radius value, supporting explicit assignment according to the SVG 2
     * specification for defining the radius of an element such as a circle.
     *
     * @param float|int|string|null $value Radius value (for example, `25`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `r` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#R
     *
     * Usage example:
     * ```php
     * $element->r(25);
     * $element->r('50%');
     * $element->r(null);
     * ```
     */
    public function r(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::R, $value);
    }
}
