<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `font-size` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `font-size` attribute on SVG elements, following the
 * SVG 2 specification for defining the font size for text content.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the font size property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `font-size` attribute.
 * - Immutable method for setting or overriding the `font-size` attribute.
 * - Supports float, int, string and `null` for flexible font size assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/font-size
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFontSize
{
    /**
     * Sets the SVG `font-size` attribute for the element.
     *
     * Creates a new instance with the specified font size value, supporting explicit assignment according to the SVG 2
     * specification for defining the size of the font from baseline to baseline.
     *
     * @param float|int|string|null $value Font size value to set for the element. Accepts any valid SVG length,
     * percentage, or keyword, or `null` to unset (for example, '16', '16px', '1.2em', '120%', or `null`).
     *
     * @return static New instance with the updated `font-size` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-size-prop
     *
     * Usage example:
     * ```php
     * // sets the `font-size` attribute to 16 user units
     * $element->fontSize(16);
     *
     * // sets the `font-size` attribute to 1.2em
     * $element->fontSize('1.2em');
     *
     * // unsets the `font-size` attribute
     * $element->fontSize(null);
     * ```
     */
    public function fontSize(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_SIZE, $value);
    }
}
