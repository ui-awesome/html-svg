<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `dy` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `dy` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the dy offset.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Delegates to `addAttribute()` for the `dy` attribute.
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
     * Creates a new instance with the specified dy-offset value for the rendered element.
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
