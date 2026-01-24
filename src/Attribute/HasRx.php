<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `rx` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `rx` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the x-axis radius.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `rx` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `rx` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible radius assignment (absolute, relative, or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/rx
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRx
{
    /**
     * Sets the SVG `rx` attribute for the element.
     *
     * Creates a new instance with the specified x-axis radius value for the rendered element.
     *
     * @param float|int|string|null $value X-axis radius value (for example, `50`, `'10px'`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `rx` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#RX
     *
     * Usage example:
     * ```php
     * $element->rx(50);
     * $element->rx('50%');
     * $element->rx(null);
     * ```
     */
    public function rx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::RX, $value);
    }
}
