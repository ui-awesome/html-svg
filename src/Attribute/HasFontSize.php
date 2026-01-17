<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `font-size` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `font-size` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the font size.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `font-size` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `font-size` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible font size assignment (absolute, relative, percentage,
 *   or unset).
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
     * Creates a new instance with the specified font size value for the rendered element.
     *
     * @param float|int|string|null $value Font size value (for example, `16`, `'1.2em'`, `'120%'`, or `null` to unset).
     *
     * @return static New instance with the updated `font-size` attribute.
     *
     * @link https://www.w3.org/TR/css-fonts-3/#font-size-prop
     *
     * Usage example:
     * ```php
     * $element->fontSize(16);
     * $element->fontSize('1.2em');
     * $element->fontSize(null);
     * ```
     */
    public function fontSize(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FONT_SIZE, $value);
    }
}
