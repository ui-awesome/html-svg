<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `font-weight` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `font-weight` attribute on SVG elements, following the
 * SVG 2 specification for defining the font weight for text content.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the font weight
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `font-weight` attribute.
 * - Immutable method for setting or overriding the `font-weight` attribute.
 * - Supports int, string and `null` for flexible font weight assignment (numeric or keyword).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified font weight value, supporting explicit assignment according to the SVG
     * 2 specification for defining the weight (or boldness) of the font.
     *
     * @param int|string|null $value Font weight value to set for the element. Accepts numeric values ('100-900') or
     * keywords ('normal', 'bold', 'bolder', 'lighter'), or `null` to unset (for example, 400, '700', 'bold', or `null`).
     *
     * @return static New instance with the updated `font-weight` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-weight-prop
     *
     * Usage example:
     * ```php
     * // sets the `font-weight` attribute to 700
     * $element->fontWeight(700);
     *
     * // sets the `font-weight` attribute to bold
     * $element->fontWeight('bold');
     *
     * // unsets the `font-weight` attribute
     * $element->fontWeight(null);
     * ```
     */
    public function fontWeight(int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_WEIGHT, $value);
    }
}
