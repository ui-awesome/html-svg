<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `textLength` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `textLength` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set text length values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `textLength` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `textLength` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible length assignment.
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/textLength
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTextLength
{
    /**
     * Sets the SVG `textLength` attribute for the element.
     *
     * Creates a new instance with the specified text length value for the rendered element.
     *
     * @param float|int|string|null $value Text length value (for example, `100`, `'50%'`, or `null` to unset).
     *
     * @return static New instance with the updated `textLength` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementTextLengthAttribute
     *
     * Usage example:
     * ```php
     * $element->textLength(100);
     * $element->textLength('50%');
     * $element->textLength(null);
     * ```
     */
    public function textLength(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TEXT_LENGTH, $value);
    }
}
