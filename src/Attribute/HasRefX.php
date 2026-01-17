<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `refX` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `refX` attribute on SVG marker elements.
 *
 * Intended for use in SVG tag and component classes that set the reference x coordinate.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `refX` attribute.
 * - Designed for use in SVG marker tag and component classes.
 * - Immutable method for setting or overriding the `refX` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/refX
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRefX
{
    /**
     * Sets the SVG `refX` attribute for the marker element.
     *
     * Creates a new instance with the specified reference x coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Reference x coordinate value (for example, `0`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `refX` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementRefXAttribute
     *
     * Usage example:
     * ```php
     * $element->refX(0);
     * $element->refX('50%');
     * $element->refX(null);
     * ```
     */
    public function refX(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::REF_X, $value);
    }
}
