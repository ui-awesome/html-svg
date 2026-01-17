<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `stroke-width` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `stroke-width` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set stroke width.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `stroke-width` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `stroke-width` attribute.
 * - Supports `int`, `string`, and `null` for flexible width assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-width
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeWidth
{
    /**
     * Sets the SVG `stroke-width` attribute for the element.
     *
     * Creates a new instance with the specified stroke width value for the rendered element.
     *
     * @param int|string|null $value Stroke width value (for example, `2`, `'1.5em'`, or `null` to unset).
     *
     * @return static New instance with the updated `stroke-width` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeWidth
     *
     * Usage example:
     * ```php
     * $element->strokeWidth(2);
     * $element->strokeWidth('1.5em');
     * $element->strokeWidth(null);
     * ```
     */
    public function strokeWidth(int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE_WIDTH, $value);
    }
}
