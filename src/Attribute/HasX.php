<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `x` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `x` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the x coordinate.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `x` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `x` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/x
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasX
{
    /**
     * Sets the SVG `x` attribute for the element.
     *
     * Creates a new instance with the specified x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value X coordinate value (for example, `10`, `10.3`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `x` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#XProperty
     *
     * Usage example:
     * ```php
     * $element->x(10);
     * $element->x('50%');
     * $element->x(null);
     * ```
     */
    public function x(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X, $value);
    }
}
