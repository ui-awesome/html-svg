<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `textLength` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `textLength` attribute on SVG elements, following the
 * SVG 2 specification for defining target length for text rendering.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the text length
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `textLength` attribute.
 * - Immutable method for setting or overriding the `textLength` attribute.
 * - Supports float, int, string and `null` for flexible length assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/textLength
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTextLength
{
    /**
     * Sets the SVG `textLength` attribute for the element.
     *
     * Creates a new instance with the specified text length value, supporting explicit assignment according to the SVG
     * 2 specification for defining the width into which text will be scaled to fit.
     *
     * @param float|int|string|null $value Text length value to set for the element. Accepts any valid SVG length or
     * `null` to unset (for example, '100', '100px', '50%', or `null`).
     *
     * @return static New instance with the updated `textLength` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextElementTextLengthAttribute
     *
     * Usage example:
     * ```php
     * // sets the `textLength` attribute to 100 user units
     * $element->textLength(100);
     *
     * // sets the `textLength` attribute to 50%
     * $element->textLength('50%');
     *
     * // unsets the `textLength` attribute
     * $element->textLength(null);
     * ```
     */
    public function textLength(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TEXT_LENGTH, $value);
    }
}
