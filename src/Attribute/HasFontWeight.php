<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `font-weight` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `font-weight` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the font weight.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `font-weight` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `font-weight` attribute.
 * - Supports `int`, `string`, and `null` for flexible font weight assignment (numeric or keyword).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/font-weight
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFontWeight
{
    /**
     * Sets the SVG `font-weight` attribute for the element.
     *
     * Creates a new instance with the specified font weight value for the rendered element.
     *
     * @param int|string|null $value Font weight value (for example, `700`, `'bold'`, or `null` to unset).
     *
     * @return static New instance with the updated `font-weight` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-weight-prop
     *
     * Usage example:
     * ```php
     * $element->fontWeight(700);
     * $element->fontWeight('bold');
     * $element->fontWeight(null);
     * ```
     */
    public function fontWeight(int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_WEIGHT, $value);
    }
}
