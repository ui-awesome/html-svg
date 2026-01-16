<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `markerWidth` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `markerWidth` attribute on SVG marker elements,
 * following the SVG 2 specification for defining the width of the marker viewport.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the marker
 * width property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG marker tag and component classes.
 * - Enforces standards-compliant handling of the SVG `markerWidth` attribute.
 * - Immutable method for setting or overriding the `markerWidth` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible width assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified marker width value, supporting explicit assignment according to the SVG
     * 2 specification for defining the width of the marker viewport.
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
