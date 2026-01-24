<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `cy` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `cy` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the center y coordinate.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `cy` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `cy` attribute.
 * - Supports `int`, `float`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/cy
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasCy
{
    /**
     * Sets the SVG `cy` attribute for the element.
     *
     * Creates a new instance with the specified center y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Center y-coordinate value (for example, `50`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `cy` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#CyProperty
     *
     * Usage example:
     * ```php
     * $element->cy(50);
     * $element->cy('50%');
     * $element->cy(null);
     * ```
     */
    public function cy(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::CY, $value);
    }
}
