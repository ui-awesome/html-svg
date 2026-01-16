<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `dx` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `dx` attribute on SVG elements, following the SVG 2
 * specification for defining horizontal offset of an element or its content.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the dx-offset
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `dx` attribute.
 * - Immutable method for setting or overriding the `dx` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible offset assignment (absolute, relative, list, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/dx
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDx
{
    /**
     * Sets the SVG `dx` attribute for the element.
     *
     * Creates a new instance with the specified dx-offset value, supporting explicit assignment according to the SVG 2
     * specification for defining the horizontal shift of an element or its content.
     *
     * @param float|int|string|null $value DX offset value (for example, `10`, `'5 10 15'`, or `null` to unset).
     *
     * @return static New instance with the updated `dx` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementDXAttribute
     *
     * Usage example:
     * ```php
     * $element->dx(10);
     * $element->dx('5 10 15');
     * $element->dx(null);
     * ```
     */
    public function dx(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::DX, $value);
    }
}
