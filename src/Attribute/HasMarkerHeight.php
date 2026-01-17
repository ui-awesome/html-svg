<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `markerHeight` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `markerHeight` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set marker height.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `markerHeight` attribute.
 * - Designed for use in SVG marker tag and component classes.
 * - Immutable method for setting or overriding the `markerHeight` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible height assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/markerHeight
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMarkerHeight
{
    /**
     * Sets the SVG `markerHeight` attribute for the marker element.
     *
     * Creates a new instance with the specified marker height value for the rendered element.
     *
     * @param float|int|string|null $value Marker height value (for example, `3`, `'10%'`, or `null` to unset).
     *
     * @return static New instance with the updated `markerHeight` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerHeightAttribute
     *
     * Usage example:
     * ```php
     * $element->markerHeight(3);
     * $element->markerHeight('10%');
     * $element->markerHeight(null);
     * ```
     */
    public function markerHeight(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::MARKER_HEIGHT, $value);
    }
}
