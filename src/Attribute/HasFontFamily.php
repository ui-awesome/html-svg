<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `font-family` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `font-family` attribute on SVG elements, following the
 * SVG 2 specification for defining the font family for text content.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the font family
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `font-family` attribute.
 * - Immutable method for setting or overriding the `font-family` attribute.
 * - Supports string and `null` for flexible font family assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified font family value, supporting explicit assignment according to the SVG
     * 2 specification for defining the font family to be used for rendering text.
     *
     * @param string|null $value Font family value to set for the element. Accepts any valid font family name or list of
     * names, or `null` to unset (for example, 'Arial', 'Arial, sans-serif', or `null`).
     *
     * @return static New instance with the updated `font-family` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-family-prop
     *
     * Usage example:
     * ```php
     * // sets the `font-family` attribute to Arial
     * $element->fontFamily('Arial');
     *
     * // sets the `font-family` attribute to a font stack
     * $element->fontFamily('Arial, Helvetica, sans-serif');
     *
     * // unsets the `font-family` attribute
     * $element->fontFamily(null);
     * ```
     */
    public function fontFamily(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_FAMILY, $value);
    }
}
