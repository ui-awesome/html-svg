<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `word-spacing` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `word-spacing` attribute on SVG elements, following the
 * SVG 2 specification for defining spacing between words in text.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the word
 * spacing property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `word-spacing` attribute.
 * - Immutable method for setting or overriding the `word-spacing` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible word spacing assignment (absolute, relative, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/word-spacing
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasWordSpacing
{
    /**
     * Sets the SVG `word-spacing` attribute for the element.
     *
     * Creates a new instance with the specified word spacing value, supporting explicit assignment according to the SVG
     * 2 specification for controlling spacing between words in text.
     *
     * @param float|int|string|null $value Word spacing value (for example, `5`, `'0.5em'`, `'normal'`, or `null` to
     * unset).
     *
     * @return static New instance with the updated `word-spacing` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#WordSpacingProperty
     *
     * Usage example:
     * ```php
     * $element->wordSpacing(5);
     * $element->wordSpacing('0.5em');
     * $element->wordSpacing(null);
     * ```
     */
    public function wordSpacing(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::WORD_SPACING, $value);
    }
}
