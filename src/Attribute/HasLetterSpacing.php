<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `letter-spacing` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `letter-spacing` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set letter spacing.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `letter-spacing` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `letter-spacing` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible letter spacing assignment (absolute, relative,
 *   percentage, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/letter-spacing
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasLetterSpacing
{
    /**
     * Sets the SVG `letter-spacing` attribute for the element.
     *
     * Creates a new instance with the specified letter spacing value for the rendered element.
     *
     * @param float|int|string|null $value Letter spacing value (for example, `2`, `'0.1em'`, `'normal'`, or `null` to
     * unset).
     *
     * @return static New instance with the updated `letter-spacing` attribute.
     *
     * @link https://www.w3.org/TR/css-text-3/#letter-spacing-property
     *
     * Usage example:
     * ```php
     * $element->letterSpacing(2);
     * $element->letterSpacing('0.1em');
     * $element->letterSpacing(null);
     * ```
     */
    public function letterSpacing(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::LETTER_SPACING, $value);
    }
}
