<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, TextAnchor};

/**
 * Trait for managing SVG `text-anchor` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `text-anchor` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set text anchor values.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Delegates to `addAttribute()` for the `text-anchor` attribute.
 * - Immutable method for setting or overriding the `text-anchor` attribute.
 * - Supports `string`, {@see TextAnchor} enum, and `null` for flexible text anchor assignment (specific value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified text anchor value for the rendered element.
     *
     * @param string|TextAnchor|null $value Text anchor value to set for the element. Accepts `start`, `middle`, `end`,
     * {@see TextAnchor} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see TextAnchor} enum or `string`.
     *
     * @return static New instance with the updated `text-anchor` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#TextAnchorProperty
     * {@see TextAnchor} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->textAnchor('middle');
     * $element->textAnchor(TextAnchor::END);
     * $element->textAnchor(null);
     * ```
     */
    public function textAnchor(string|TextAnchor|null $value): static
    {
        Validator::oneOf($value, TextAnchor::cases(), SvgAttribute::TEXT_ANCHOR);

        return $this->addAttribute(SvgAttribute::TEXT_ANCHOR, $value);
    }
}
