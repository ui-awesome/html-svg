<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, WritingMode};
use UnitEnum;

/**
 * Trait for managing SVG `writing-mode` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `writing-mode` attribute on SVG elements, following the SVG
 * 2 specification for writing mode properties.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of writing mode property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `writing-mode` attribute.
 * - Immutable method for setting or overriding the `writing-mode` attribute.
 * - Supports string, UnitEnum, and `null` for flexible writing mode assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified writing mode value, supporting explicit assignment according to the SVG
     * 2 specification for writing mode properties.
     *
     * @param string|UnitEnum|null $value Writing mode value to set for the element. Accepts `horizontal-tb`,
     * `vertical-rl`, `vertical-lr`, `sideways-rl`, `sideways-lr`, {@see WritingMode} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see WritingMode} enum or string.
     *
     * @return static New instance with the updated `writing-mode` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#WritingModeProperty
     * {@see WritingMode} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `writing-mode` attribute to 'vertical-rl'
     * $element->writingMode('vertical-rl');
     *
     * // sets the `writing-mode` attribute using enum
     * $element->writingMode(WritingMode::HORIZONTAL_TB);
     *
     * // unsets the `writing-mode` attribute
     * $element->writingMode(null);
     * ```
     */
    public function writingMode(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, WritingMode::cases(), SvgAttribute::WRITING_MODE);

        return $this->addAttribute(SvgAttribute::WRITING_MODE, $value);
    }
}
