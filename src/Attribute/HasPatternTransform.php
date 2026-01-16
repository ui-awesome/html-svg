<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `patternTransform` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `patternTransform` attribute on SVG `<pattern>`
 * elements, following the SVG 2 specification for pattern transformations.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the pattern
 * transform property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG `<pattern>` tag and component classes.
 * - Enforces standards-compliant handling of the SVG `patternTransform` attribute.
 * - Immutable method for setting or overriding the `patternTransform` attribute.
 * - Supports `string` and `null` for flexible transform assignment (`matrix`, `translate`, `scale`, `rotate`, `skew`,
 *   or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/patternTransform
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPatternTransform
{
    /**
     * Sets the SVG `patternTransform` attribute for the `<pattern>` element.
     *
     * Creates a new instance with the specified pattern transform value, supporting explicit assignment according to
     * the SVG 2 specification for transforming pattern tiles.
     *
     * @param string|null $value Transform value (for example, `'rotate(45)'`, `'scale(2)'`, or `null` to unset).
     *
     * @return static New instance with the updated `patternTransform` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#PatternElementPatternTransformAttribute
     *
     * Usage example:
     * ```php
     * $element->patternTransform('rotate(45)');
     * $element->patternTransform('scale(2)');
     * $element->patternTransform(null);
     * ```
     */
    public function patternTransform(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::PATTERN_TRANSFORM, $value);
    }
}
