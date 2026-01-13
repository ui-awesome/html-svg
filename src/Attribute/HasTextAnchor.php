<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, TextAnchor};
use UnitEnum;

/**
 * Trait for managing SVG `text-anchor` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `text-anchor` attribute on SVG elements, following the SVG
 * 2 specification for text anchor positioning properties.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of text anchor property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `text-anchor` attribute.
 * - Immutable method for setting or overriding the `text-anchor` attribute.
 * - Supports string, UnitEnum, and `null` for flexible text anchor assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/text-anchor
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTextAnchor
{
    /**
     * Sets SVG `text-anchor` attribute for the element.
     *
     * Creates a new instance with the specified text anchor value, supporting explicit assignment according to the SVG
     * 2 specification for text anchor positioning properties.
     *
     * @param string|UnitEnum|null $value Text anchor value to set for the element. Accepts `start`, `middle`, `end`,
     * {@see TextAnchor} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see TextAnchor} enum or string.
     *
     * @return static New instance with the updated `text-anchor` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     * {@see TextAnchor} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `text-anchor` attribute to 'middle'
     * $element->textAnchor('middle');
     *
     * // sets the `text-anchor` attribute using enum
     * $element->textAnchor(TextAnchor::END);
     *
     * // unsets the `text-anchor` attribute
     * $element->textAnchor(null);
     * ```
     */
    public function textAnchor(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, TextAnchor::cases(), SvgAttribute::TEXT_ANCHOR);

        return $this->addAttribute(SvgAttribute::TEXT_ANCHOR, $value);
    }
}
