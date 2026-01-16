<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `stroke-width` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `stroke-width` attribute on SVG elements, following the
 * SVG 2 specification for controlling the thickness of the stroke applied to shapes and text content elements.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the stroke
 * width property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `stroke-width` attribute.
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
     * Creates a new instance with the specified stroke width value, supporting explicit assignment according to the
     * SVG 2 specification for controlling the thickness of the outline painted for shapes and text content elements.
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
