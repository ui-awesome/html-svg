<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgProperty;

/**
 * Trait for managing the SVG `transform` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `transform` attribute on SVG elements, following the
 * SVG 2 and HTML specifications for coordinate systems and transformations.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the transform property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features:
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `transform` attribute.
 * - Immutable method for setting or overriding the `transform` attribute.
 * - Supports `string` and `null` for flexible transform assignment (matrix, translate, scale, rotate, skew, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/transform
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTransform
{
    /**
     * Sets the SVG `transform` attribute for the element.
     *
     * Creates a new instance with the specified transform value, supporting explicit assignment according to the SVG 2
     * and HTML specifications for transforming coordinate systems of graphical content.
     *
     * @param string|null $value Transform value to set for the element. Accepts any valid SVG transform specification
     * (for example, 'rotate(45)', 'scale(2)', 'translate(10,20)', or `null` to unset).
     *
     * @return static New instance with the updated `transform` attribute.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#TransformProperty
     *
     * Usage example:
     * ```php
     * // sets the `transform` attribute to rotate 45 degrees
     * $element->transform('rotate(45)');
     *
     * // sets the `transform` attribute to scale by 2
     * $element->transform('scale(2)');
     *
     * // unsets the `transform` attribute
     * $element->transform(null);
     * ```
     */
    public function transform(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::TRANSFORM, $value);
    }
}
