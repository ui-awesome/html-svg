<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{DominantBaseline, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing SVG `dominant-baseline` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `dominant-baseline` attribute on SVG elements, following
 * the SVG 2 specification for baseline alignment properties.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of dominant baseline
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `dominant-baseline` attribute.
 * - Immutable method for setting or overriding the `dominant-baseline` attribute.
 * - Supports string, UnitEnum, and `null` for flexible baseline alignment assignment (specific value or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified dominant baseline value, supporting explicit assignment according to
     * the SVG 2 specification for baseline alignment properties.
     *
     * @param string|UnitEnum|null $value Dominant baseline value to set for the element. Accepts `auto`, `alphabetic`,
     * `middle`, `central`, `hanging`, `mathematical`, `ideographic`, `text-top`, `text-bottom`, {@see DominantBaseline}
     * enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see DominantBaseline} enum or string.
     *
     * @return static New instance with the updated `dominant-baseline` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/text.html#DominantBaselineProperty
     * {@see DominantBaseline} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `dominant-baseline` attribute to 'middle'
     * $element->dominantBaseline('middle');
     *
     * // sets the `dominant-baseline` attribute using enum
     * $element->dominantBaseline(DominantBaseline::HANGING);
     *
     * // unsets the `dominant-baseline` attribute
     * $element->dominantBaseline(null);
     * ```
     */
    public function dominantBaseline(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, DominantBaseline::cases(), SvgAttribute::DOMINANT_BASELINE);

        return $this->addAttribute(SvgAttribute::DOMINANT_BASELINE, $value);
    }
}
