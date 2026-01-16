<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `dy` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `dy` attribute on SVG elements, following the SVG 2
 * specification for defining vertical offset of an element or its content.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the dy-offset
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `dy` attribute.
 * - Immutable method for setting or overriding the `dy` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible offset assignment (absolute, relative, list, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/dy
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDy
{
    /**
     * Sets the SVG `dy` attribute for the element.
     *
     * Creates a new instance with the specified dy-offset value, supporting explicit assignment according to the SVG 2
     * specification for defining the vertical shift of an element or its content.
     *
     * @param float|int|string|null $value DY offset value (for example, `10`, `'5 10 15'`, or `null` to unset).
     *
     * @return static New instance with the updated `dy` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementDYAttribute
     *
     * Usage example:
     * ```php
     * $element->dy(10);
     * $element->dy('5 10 15');
     * $element->dy(null);
     * ```
     */
    public function dy(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::DY, $value);
    }
}
