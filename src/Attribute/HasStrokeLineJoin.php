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
 * Provides a method that delegates to `addAttribute()` to set the `stroke-linejoin` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the stroke line join.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `stroke-linejoin` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `stroke-linejoin` attribute.
 * - Supports `string`, {@see StrokeLineJoin} enum, and `null` for flexible join assignment (`miter`, `round`,
 *   `bevel`, `miter-clip`, `arcs`, or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linejoin
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeLineJoin
{
    /**
     * Sets the SVG `stroke-linejoin` attribute for the element.
     *
     * @param string|StrokeLineJoin|null $value Stroke line join style (for example, `'miter'`,
     * {@see StrokeLineJoin} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see StrokeLineJoin} enum or `string`.
     *
     * @return static New instance with the updated `stroke-linejoin` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     * {@see StrokeLineJoin} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->strokeLineJoin('miter');
     * $element->strokeLineJoin(StrokeLineJoin::ROUND);
     * $element->strokeLineJoin(null);
     * ```
     */
    public function strokeLineJoin(string|StrokeLineJoin|null $value): static
    {
        Validator::oneOf($value, StrokeLineJoin::cases(), SvgAttribute::STROKE_LINEJOIN);

        return $this->addAttribute(SvgAttribute::STROKE_LINEJOIN, $value);
    }
}
