<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `r` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `r` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the radius.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Delegates to `addAttribute()` for the `r` attribute.
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
     * Creates a new instance with the specified radius value for the rendered element.
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
