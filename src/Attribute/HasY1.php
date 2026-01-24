<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `y1` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `y1` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the first y coordinate.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `y1` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `y1` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/y1
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasY1
{
    /**
     * Sets the SVG `y1` attribute for the element.
     *
     * Creates a new instance with the specified first y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value First y coordinate value (for example, `10`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `y1` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#LineElementY1Attribute
     *
     * Usage example:
     * ```php
     * $element->y1(10);
     * $element->y1('50%');
     * $element->y1(null);
     * ```
     */
    public function y1(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y1, $value);
    }
}
