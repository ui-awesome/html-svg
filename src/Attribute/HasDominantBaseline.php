<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{DominantBaseline, SvgAttribute};

/**
 * Trait for managing SVG `dominant-baseline` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `dominant-baseline` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set dominant baseline values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `dominant-baseline` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `dominant-baseline` attribute.
 * - Supports `string`, {@see DominantBaseline} enum, and `null` for flexible baseline alignment assignment (specific
 *   value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/dominant-baseline
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDominantBaseline
{
    /**
     * Sets SVG `dominant-baseline` attribute for the element.
     *
     * Creates a new instance with the specified dominant baseline value for the rendered element.
     *
     * @param DominantBaseline|string|null $value Dominant baseline value to set for the element. Accepts `auto`,
     * `alphabetic`, `middle`, `central`, `hanging`, `mathematical`, `ideographic`, `text-top`, `text-bottom`,
     * {@see DominantBaseline} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see DominantBaseline} enum or `string`.
     *
     * @return static New instance with the updated `dominant-baseline` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     * {@see DominantBaseline} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->dominantBaseline('middle');
     * $element->dominantBaseline(DominantBaseline::HANGING);
     * $element->dominantBaseline(null);
     * ```
     */
    public function dominantBaseline(DominantBaseline|string|null $value): static
    {
        Validator::oneOf($value, DominantBaseline::cases(), SvgAttribute::DOMINANT_BASELINE);

        return $this->addAttribute(SvgAttribute::DOMINANT_BASELINE, $value);
    }
}
