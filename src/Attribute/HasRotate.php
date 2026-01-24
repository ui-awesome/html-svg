<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `rotate` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `rotate` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set rotation values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `rotate` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `rotate` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible rotation assignment (single value, list, or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/rotate
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRotate
{
    /**
     * Sets the SVG `rotate` attribute for the element.
     *
     * Creates a new instance with the specified rotation value for the rendered element.
     *
     * @param float|int|string|null $value Rotate value (for example, `45`, `'10 20 30 40'`, or `null` to unset).
     *
     * @return static New instance with the updated `rotate` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementRotateAttribute
     *
     * Usage example:
     * ```php
     * $element->rotate(45);
     * $element->rotate('10 20 30 40');
     * $element->rotate(null);
     * ```
     */
    public function rotate(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::ROTATE, $value);
    }
}
