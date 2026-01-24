<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{FillRule, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing SVG `fill-rule` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `fill-rule` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the fill rule.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `fill-rule` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `fill-rule` attribute.
 * - Supports `string`, {@see FillRule} enum, and `null` for flexible fill rule assignment (specific value or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fill-rule
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFillRule
{
    /**
     * Sets SVG `fill-rule` attribute for the element.
     *
     * Creates a new instance with the specified fill rule value for the rendered element.
     *
     * @param FillRule|string|null $value Fill rule value to set for the element. Accepts `nonzero`, `evenodd`,
     * {@see FillRule} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see FillRule} enum or `string`.
     *
     * @return static New instance with the updated `fill-rule` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#WindingRule
     * {@see FillRule} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->fillRule('nonzero');
     * $element->fillRule(FillRule::EVENODD);
     * $element->fillRule(null);
     * ```
     */
    public function fillRule(FillRule|string|null $value): static
    {
        Validator::oneOf($value, FillRule::cases(), SvgAttribute::FILL_RULE);

        return $this->addAttribute(SvgAttribute::FILL_RULE, $value);
    }
}
