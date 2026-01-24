<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `markerWidth` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `markerWidth` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set marker width.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `markerWidth` attribute.
 * - Designed for use in SVG marker tag and component classes.
 * - Immutable method for setting or overriding the `markerWidth` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible width assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/markerWidth
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMarkerWidth
{
    /**
     * Sets the SVG `markerWidth` attribute for the marker element.
     *
     * Creates a new instance with the specified marker width value for the rendered element.
     *
     * @param float|int|string|null $value Marker width value (for example, `3`, `'10%'`, or `null` to unset).
     *
     * @return static New instance with the updated `markerWidth` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerWidthAttribute
     *
     * Usage example:
     * ```php
     * $element->markerWidth(3);
     * $element->markerWidth('10%');
     * $element->markerWidth(null);
     * ```
     */
    public function markerWidth(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::MARKER_WIDTH, $value);
    }
}
