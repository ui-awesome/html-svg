<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{StrokeLineJoin, SvgProperty};
use UnitEnum;

/**
 * Trait for managing the SVG `stroke-linejoin` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `stroke-linejoin` attribute on SVG elements, following
 * the SVG 2 specification for controlling the shape of the corners where two lines meet in a stroked path or shape.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the stroke line join
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features:
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `stroke-linejoin` attribute.
 * - Immutable method for setting or overriding the `stroke-linejoin` attribute.
 * - Supports string, UnitEnum, and `null` for flexible join assignment ('miter', 'round', 'bevel', 'miter-clip',
 *   'arcs', or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke-linejoin
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeLineJoin
{
    /**
     * Sets the SVG `stroke-linejoin` attribute for the element.
     *
     * Creates a new instance with the specified stroke line join value, supporting explicit assignment according to the
     * SVG 2 specification for painting corners of shapes and text content elements.
     *
     * @param string|UnitEnum|null $value Stroke line join style to set for the element. Accepts 'miter', 'round',
     * 'bevel', 'miter-clip', 'arcs', or `null` to unset.
     *
     * @return static New instance with the updated `stroke-linejoin` attribute.
     *
     * @link https://svgwg.org/svg2-draft/painting.html#LineJoin
     * {@see StrokeLineJoin} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `stroke-linejoin` attribute to 'round'
     * $element->strokeLineJoin('round');
     *
     * // sets the `stroke-linejoin` attribute to 'bevel' using enum
     * $element->strokeLineJoin(StrokeLineJoin::BEVEL);
     *
     * // unsets the `stroke-linejoin` attribute
     * $element->strokeLineJoin(null);
     * ```
     */
    public function strokeLineJoin(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, StrokeLineJoin::cases(), SvgProperty::STROKE_LINEJOIN);

        return $this->addAttribute(SvgProperty::STROKE_LINEJOIN, $value);
    }
}
