<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `fy` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `fy` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the start circle y-coordinate for radial gradients.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `fy` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `fy` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fy
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFy
{
    /**
     * Sets the SVG `fy` attribute for the element.
     *
     * Creates a new instance with the specified start circle y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Start circle y-coordinate value (for example, `50`, `'50%'`, or `null` to
     * unset).
     *
     * @return static New instance with the updated `fy` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#RadialGradientElementFYAttribute
     *
     * Usage example:
     * ```php
     * $element->fy(50);
     * $element->fy('50%');
     * $element->fy(null);
     * ```
     */
    public function fy(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FY, $value);
    }
}
