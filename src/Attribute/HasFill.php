<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `fill` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `fill` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the fill paint value.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `fill` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `fill` attribute.
 * - Supports `string` and `null` for flexible fill assignment (color, pattern, gradient, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fill
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFill
{
    /**
     * Sets the SVG `fill` attribute for the element.
     *
     * Creates a new instance with the specified fill value for the rendered element.
     *
     * @param string|null $value Fill value (for example, `'red'`, `'url(#gradient1)'`, or `null` to unset).
     *
     * @return static New instance with the updated `fill` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillProperties
     *
     * Usage example:
     * ```php
     * $element->fill('red');
     * $element->fill('url(#gradient1)');
     * $element->fill(null);
     * ```
     */
    public function fill(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FILL, $value);
    }
}
