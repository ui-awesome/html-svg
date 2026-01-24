<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `gradientTransform` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `gradientTransform` attribute on SVG gradient
 * elements.
 *
 * Intended for use in SVG tag and component classes that set the gradient transform.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `gradientTransform` attribute.
 * - Designed for use in SVG gradient tag and component classes.
 * - Immutable method for setting or overriding the `gradientTransform` attribute.
 * - Supports `string` and `null` for flexible transform assignment (matrix, translate, scale, rotate, skew, or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/gradientTransform
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasGradientTransform
{
    /**
     * Sets the SVG `gradientTransform` attribute for the gradient element.
     *
     * Creates a new instance with the specified gradient transform value for the rendered element.
     *
     * @param string|null $value Transform value (for example, `'rotate(45)'`, `'scale(2)'`, or `null` to unset).
     *
     * @return static New instance with the updated `gradientTransform` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementGradientTransformAttribute
     *
     * Usage example:
     * ```php
     * $element->gradientTransform('rotate(45)');
     * $element->gradientTransform('scale(2)');
     * $element->gradientTransform(null);
     * ```
     */
    public function gradientTransform(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::GRADIENT_TRANSFORM, $value);
    }
}
