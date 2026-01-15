<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{FillRule, SvgAttribute};

/**
 * Trait for managing SVG `fill-rule` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `fill-rule` attribute on SVG elements, following the SVG 2
 * specification for painting properties.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of fill rule property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `fill-rule` attribute.
 * - Immutable method for setting or overriding the `fill-rule` attribute.
 * - Supports string, {@see FillRule} enum, and `null` for flexible fill rule assignment (specific value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/fill-rule
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFillRule
{
    /**
     * Sets SVG `fill-rule` attribute for the element.
     *
     * Creates a new instance with the specified fill rule value, supporting explicit assignment according to the SVG 2
     * specification for painting properties.
     *
     * @param FillRule|string|null $value Fill rule value to set for the element. Accepts `nonzero`, `evenodd`,
     * {@see FillRule} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see FillRule} enum or string.
     *
     * @return static New instance with the updated `fill-rule` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#WindingRule
     * {@see FillRule} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `fill-rule` attribute to 'nonzero'
     * $element->fillRule('nonzero');
     *
     * // sets the `fill-rule` attribute using enum
     * $element->fillRule(FillRule::EVENODD);
     *
     * // unsets the `fill-rule` attribute
     * $element->fillRule(null);
     * ```
     */
    public function fillRule(string|FillRule|null $value): static
    {
        Validator::oneOf($value, FillRule::cases(), SvgAttribute::FILL_RULE);

        return $this->addAttribute(SvgAttribute::FILL_RULE, $value);
    }
}
