<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `text-decoration` shorthand attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `text-decoration` attribute on SVG text elements,
 * following the SVG 2 specification and CSS Text Decoration Module for text decoration values.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the text decoration
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG text tag and component classes.
 * - Enforces standards-compliant handling of the SVG `text-decoration` shorthand attribute.
 * - Immutable method for setting or overriding the `text-decoration` attribute.
 * - Supports string (space-separated shorthand), UnitEnum, and `null` for flexible text decoration assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/text-decoration
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTextDecoration
{
    /**
     * Sets the SVG `text-decoration` shorthand attribute for the text element.
     *
     * Creates a new instance with the specified text decoration value, supporting explicit assignment according to the
     * SVG 2 specification and CSS Text Decoration Module for defining decorative lines, styles, and colors on text.
     *
     * @param string|UnitEnum|null $value Text decoration shorthand value to set for the element.
     * Accepts {@see TextDecorationLine} enum, {@see TextDecorationStyle} enum, space-separated shorthand (for example,
     * 'underline wavy red'), or `null` to unset.
     *
     * @return static New instance with the updated `text-decoration` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextDecorationProperties
     * {@see TextDecorationLine} for predefined line enum values.
     * {@see TextDecorationStyle} for predefined style enum values.
     *
     * Usage example:
     * ```php
     * // sets the `text-decoration` attribute to 'underline'
     * $element->textDecoration('underline');
     *
     * // sets multiple line decorations with style and color
     * $element->textDecoration('underline overline wavy red');
     *
     * // sets the `text-decoration` attribute using a line enum
     * $element->textDecoration(TextDecorationLine::LINE_THROUGH);
     *
     * // sets the `text-decoration` attribute using a style enum
     * $element->textDecoration(TextDecorationStyle::DASHED);
     *
     * // unsets the `text-decoration` attribute
     * $element->textDecoration(null);
     * ```
     */
    public function textDecoration(string|UnitEnum|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TEXT_DECORATION, $value);
    }
}
