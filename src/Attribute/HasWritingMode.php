<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, WritingMode};

/**
 * Trait for managing SVG `writing-mode` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `writing-mode` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set writing mode values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `writing-mode` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `writing-mode` attribute.
 * - Supports `string`, {@see WritingMode} enum, and `null` for flexible writing mode assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/writing-mode
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasWritingMode
{
    /**
     * Sets SVG `writing-mode` attribute for the element.
     *
     * Creates a new instance with the specified writing mode value for the rendered element.
     *
     * @param string|WritingMode|null $value Writing mode value to set for the element. Accepts `horizontal-tb`,
     * `vertical-rl`, `vertical-lr`, `sideways-rl`, `sideways-lr`, {@see WritingMode} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see WritingMode} enum or `string`.
     *
     * @return static New instance with the updated `writing-mode` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#WritingModeProperty
     * {@see WritingMode} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->writingMode('vertical-rl');
     * $element->writingMode(WritingMode::HORIZONTAL_TB);
     * $element->writingMode(null);
     * ```
     */
    public function writingMode(string|WritingMode|null $value): static
    {
        Validator::oneOf($value, WritingMode::cases(), SvgAttribute::WRITING_MODE);

        return $this->addAttribute(SvgAttribute::WRITING_MODE, $value);
    }
}
