<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `cx` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `cx` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the center x coordinate.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `cx` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `cx` attribute.
 * - Supports `int`, `float`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/cx
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasCx
{
    /**
     * Sets the SVG `cx` attribute for the element.
     *
     * Creates a new instance with the specified center x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Center x-coordinate value (for example, `50`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `cx` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#CxProperty
     *
     * Usage example:
     * ```php
     * $element->cx(50);
     * $element->cx('50%');
     * $element->cx(null);
     * ```
     */
    public function cx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::CX, $value);
    }
}
