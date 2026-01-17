<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{SpreadMethod, SvgAttribute};

/**
 * Trait for managing the SVG `spreadMethod` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `spreadMethod` attribute on SVG gradient elements.
 *
 * Intended for use in SVG tag and component classes that set the spread method attribute.
 *
 * Key features.
 * - Designed for use in SVG gradient tag and component classes.
 * - Delegates to `addAttribute()` for the `spreadMethod` attribute.
 * - Immutable method for setting or overriding the `spreadMethod` attribute.
 * - Supports `string`, {@see SpreadMethod} enum, and `null` for flexible spread method assignment (specific value or
 *   unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/spreadMethod
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSpreadMethod
{
    /**
     * Sets the SVG `spreadMethod` attribute for the gradient element.
     *
     * Creates a new instance with the specified spread method value for the rendered element.
     *
     * @param SpreadMethod|string|null $value Spread method value (for example, `'pad'`, {@see SpreadMethod} enum, or
     * `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see SpreadMethod} enum or `string`.
     *
     * @return static New instance with the updated `spreadMethod` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#LinearGradientElementSpreadMethodAttribute
     * {@see SpreadMethod} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->spreadMethod('pad');
     * $element->spreadMethod(SpreadMethod::REFLECT);
     * $element->spreadMethod(null);
     * ```
     */
    public function spreadMethod(SpreadMethod|string|null $value): static
    {
        Validator::oneOf($value, SpreadMethod::cases(), SvgAttribute::SPREAD_METHOD);

        return $this->addAttribute(SvgAttribute::SPREAD_METHOD, $value);
    }
}
