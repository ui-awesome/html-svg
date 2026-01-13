<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `letter-spacing` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `letter-spacing` attribute on SVG elements, following
 * the SVG 2 specification for defining spacing between text characters.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the letter spacing
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `letter-spacing` attribute.
 * - Immutable method for setting or overriding the `letter-spacing` attribute.
 * - Supports float, int, string and `null` for flexible letter spacing assignment.
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
     * Creates a new instance with the specified letter spacing value, supporting explicit assignment according to the
     * SVG 2 specification for controlling spacing between text characters.
     *
     * @param float|int|string|null $value Letter spacing value to set for the element. Accepts any valid SVG length
     * or keyword ('normal'), or `null` to unset (for example, '2', '0.1em', 'normal', or `null`).
     *
     * @return static New instance with the updated `letter-spacing` attribute.
     *
     * @link https://www.w3.org/TR/css-text-3/#letter-spacing-property
     *
     * Usage example:
     * ```php
     * // sets the `letter-spacing` attribute to 2 user units
     * $element->letterSpacing(2);
     *
     * // sets the `letter-spacing` attribute to 0.1em
     * $element->letterSpacing('0.1em');
     *
     * // unsets the `letter-spacing` attribute
     * $element->letterSpacing(null);
     * ```
     */
    public function letterSpacing(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::LETTER_SPACING, $value);
    }
}
