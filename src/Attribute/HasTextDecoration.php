<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\{SvgAttribute, TextDecorationLine, TextDecorationStyle};

/**
 * Trait for managing the SVG `text-decoration` shorthand attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `text-decoration` attribute on SVG text elements.
 *
 * Intended for use in SVG tag and component classes that set text decoration values.
 *
 * Key features.
 * - Designed for use in SVG text tag and component classes.
 * - Delegates to `addAttribute()` for the `text-decoration` attribute.
 * - Immutable method for setting or overriding the `text-decoration` attribute.
 * - Supports `string` (space-separated shorthand), {@see TextDecorationLine} enum, {@see TextDecorationStyle} enum,
 *   and `null` for flexible text decoration assignment (specific value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified text decoration value for the rendered element.
     *
     * @param string|TextDecorationLine|TextDecorationStyle|null $value Text decoration shorthand value (for example,
     * `'underline wavy red'`, {@see TextDecorationLine} enum, or `null` to unset).
     *
     * @return static New instance with the updated `text-decoration` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextDecorationProperties
     * {@see TextDecorationLine} for predefined line enum values.
     * {@see TextDecorationStyle} for predefined style enum values.
     *
     * Usage example:
     * ```php
     * $element->textDecoration('underline');
     * $element->textDecoration(TextDecorationLine::LINE_THROUGH);
     * $element->textDecoration(null);
     * ```
     */
    public function textDecoration(string|TextDecorationLine|TextDecorationStyle|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TEXT_DECORATION, $value);
    }
}
