<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `y2` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `y2` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the second y coordinate.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `y2` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `y2` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/y2
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasY2
{
    /**
     * Sets the SVG `y2` attribute for the element.
     *
     * Creates a new instance with the specified second y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Second y coordinate value (for example, `10`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `y2` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementY2Attribute
     *
     * Usage example:
     * ```php
     * $element->y2(10);
     * $element->y2('50%');
     * $element->y2(null);
     * ```
     */
    public function y2(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y2, $value);
    }
}
