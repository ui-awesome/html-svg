<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `fr` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `fr` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the start circle radius for radial gradients.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `fr` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `fr` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible radius assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fr
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFr
{
    /**
     * Sets the SVG `fr` attribute for the element.
     *
     * Creates a new instance with the specified start circle radius value for the rendered element.
     *
     * @param float|int|string|null $value Start circle radius value (for example, `25`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `fr` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#RadialGradientElementFRAttribute
     *
     * Usage example:
     * ```php
     * $element->fr(25);
     * $element->fr('50%');
     * $element->fr(null);
     * ```
     */
    public function fr(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FR, $value);
    }
}
