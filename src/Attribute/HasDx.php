<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `dx` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `dx` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the dx offset.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `dx` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `dx` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible offset assignment (absolute, relative, list, or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/dx
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDx
{
    /**
     * Sets the SVG `dx` attribute for the element.
     *
     * Creates a new instance with the specified dx-offset value for the rendered element.
     *
     * @param float|int|string|null $value DX offset value (for example, `10`, `'5 10 15'`, or `null` to unset).
     *
     * @return static New instance with the updated `dx` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementDXAttribute
     *
     * Usage example:
     * ```php
     * $element->dx(10);
     * $element->dx('5 10 15');
     * $element->dx(null);
     * ```
     */
    public function dx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::DX, $value);
    }
}
