<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{FontStyle, SvgAttribute};

/**
 * Trait for managing SVG `font-style` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `font-style` attribute on SVG elements, following the SVG 2
 * specification for font style properties.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of font style property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `font-style` attribute.
 * - Immutable method for setting or overriding the `font-style` attribute.
 * - Supports string, {@see FontStyle} enum, and `null` for flexible font style assignment (specific value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified font style value, supporting explicit assignment according to the SVG 2
     * specification for font style properties.
     *
     * @param FontStyle|string|null $value Font style value to set for the element. Accepts `normal`, `italic`,
     * `oblique`, {@see FontStyle} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see FontStyle} enum or string.
     *
     * @return static New instance with the updated `font-style` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-style-prop
     * {@see FontStyle} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `font-style` attribute to 'italic'
     * $element->fontStyle('italic');
     *
     * // sets the `font-style` attribute using enum
     * $element->fontStyle(FontStyle::OBLIQUE);
     *
     * // unsets the `font-style` attribute
     * $element->fontStyle(null);
     * ```
     */
    public function fontStyle(FontStyle|string|null $value): static
    {
        Validator::oneOf($value, FontStyle::cases(), SvgAttribute::FONT_STYLE);

        return $this->addAttribute(SvgAttribute::FONT_STYLE, $value);
    }
}
