<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{FontStyle, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing SVG `font-style` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `font-style` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set font style values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `font-style` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `font-style` attribute.
 * - Supports `string`, {@see FontStyle} enum, and `null` for flexible font style assignment (specific value or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/font-style
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFontStyle
{
    /**
     * Sets SVG `font-style` attribute for the element.
     *
     * Creates a new instance with the specified font style value for the rendered element.
     *
     * @param FontStyle|string|null $value Font style value to set for the element. Accepts `normal`, `italic`,
     * `oblique`, {@see FontStyle} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see FontStyle} enum or `string`.
     *
     * @return static New instance with the updated `font-style` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-style-prop
     * {@see FontStyle} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->fontStyle('italic');
     * $element->fontStyle(FontStyle::OBLIQUE);
     * $element->fontStyle(null);
     * ```
     */
    public function fontStyle(FontStyle|string|null $value): static
    {
        Validator::oneOf($value, FontStyle::cases(), SvgAttribute::FONT_STYLE);

        return $this->addAttribute(SvgAttribute::FONT_STYLE, $value);
    }
}
