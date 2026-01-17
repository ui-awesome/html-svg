<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `ry` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `ry` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the y-axis radius.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `ry` attribute.
 * - Designed for use in SVG tag and component classes.
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
     * Creates a new instance with the specified y-axis radius value for the rendered element.
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
