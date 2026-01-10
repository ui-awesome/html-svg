<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{StrokeLineJoin, SvgAttribute};
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
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `stroke-linejoin` attribute.
 * - Immutable method for setting or overriding the `stroke-linejoin` attribute.
 * - Supports string, UnitEnum, and `null` for flexible join assignment ('miter', 'round', 'bevel', 'miter-clip',
 *   'arcs', or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
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
     * @param string|UnitEnum|null $value Stroke line join style to set for the element. Accepts 'miter', 'round',
     * 'bevel', 'miter-clip', 'arcs', or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see StrokeLineJoin} enum or string.
     *
     * @return static New instance with the updated `stroke-linejoin` attribute.
     */
    public function strokeLineJoin(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, StrokeLineJoin::cases(), SvgAttribute::STROKE_LINEJOIN);

        return $this->addAttribute(SvgAttribute::STROKE_LINEJOIN, $value);
    }
}
