<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `refY` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `refY` attribute on SVG marker elements.
 *
 * Intended for use in SVG tag and component classes that set the reference y coordinate.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `refY` attribute.
 * - Designed for use in SVG marker tag and component classes.
 * - Immutable method for setting or overriding the `refY` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/refY
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRefY
{
    /**
     * Sets the SVG `refY` attribute for the marker element.
     *
     * Creates a new instance with the specified reference y coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Reference y coordinate value (for example, `0`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `refY` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementRefYAttribute
     *
     * Usage example:
     * ```php
     * $element->refY(0);
     * $element->refY('50%');
     * $element->refY(null);
     * ```
     */
    public function refY(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::REF_Y, $value);
    }
}
