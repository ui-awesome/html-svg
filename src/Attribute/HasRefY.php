<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `refY` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `refY` attribute on SVG marker elements, following the
 * SVG 2 specification for defining the y coordinate for the reference point of the marker.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the reference
 * y coordinate property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG marker tag and component classes.
 * - Enforces standards-compliant handling of the SVG `refY` attribute.
 * - Immutable method for setting or overriding the `refY` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible coordinate assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/refY
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRefY
{
    /**
     * Sets the SVG `refY` attribute for the marker element.
     *
     * Creates a new instance with the specified reference y coordinate value, supporting explicit assignment according
     * to the SVG 2 specification for defining the vertical position of the marker's reference point.
     *
     * @param float|int|string|null $value Reference y coordinate value (for example, `0`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `refY` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementRefYAttribute
     *
     * Usage example:
     * ```php
     * $element->refY(0);
     * $element->refY('50%');
     * $element->refY(null);
     * ```
     */
    public function refY(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::REF_Y, $value);
    }
}
