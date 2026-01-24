<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `font-family` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `font-family` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the font family.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `font-family` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `font-family` attribute.
 * - Supports `string` and `null` for flexible font family assignment (specific font(s) or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/font-family
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFontFamily
{
    /**
     * Sets the SVG `font-family` attribute for the element.
     *
     * Creates a new instance with the specified font family value for the rendered element.
     *
     * @param string|null $value Font family value (for example, `'Arial'`, `'Arial, sans-serif'`, or `null` to unset).
     *
     * @return static New instance with the updated `font-family` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-family-prop
     *
     * Usage example:
     * ```php
     * $element->fontFamily('Arial');
     * $element->fontFamily('Arial, Helvetica, sans-serif');
     * $element->fontFamily(null);
     * ```
     */
    public function fontFamily(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_FAMILY, $value);
    }
}
