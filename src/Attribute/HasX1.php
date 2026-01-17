<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `x1` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `x1` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the first x coordinate.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Delegates to `addAttribute()` for the `x1` attribute.
 * - Immutable method for setting or overriding the `x1` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/x1
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasX1
{
    /**
     * Sets the SVG `x1` attribute for the element.
     *
     * Creates a new instance with the specified first x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value First x coordinate value (for example, `10`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `x1` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementX1Attribute
     *
     * Usage example:
     * ```php
     * $element->x1(10);
     * $element->x1('50%');
     * $element->x1(null);
     * ```
     */
    public function x1(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X1, $value);
    }
}
