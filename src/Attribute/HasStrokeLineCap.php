<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{StrokeLineCap, SvgAttribute};

/**
 * Trait for managing the SVG `stroke-linecap` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `stroke-linecap` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the stroke line cap.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Delegates to `addAttribute()` for the `stroke-linecap` attribute.
 * - Immutable method for setting or overriding the `stroke-linecap` attribute.
 * - Supports `string`, {@see StrokeLineCap} enum, and `null` for flexible cap assignment (`butt`, `round`, `square`,
 *   or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-linecap
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeLineCap
{
    /**
     * Sets the SVG `stroke-linecap` attribute for the element.
     *
     * Creates a new instance with the specified stroke line cap value for the rendered element.
     *
     * @param string|StrokeLineCap|null $value Stroke line cap style (for example, `'round'`,
     * {@see StrokeLineCap} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see StrokeLineCap} enum or `string`.
     *
     * @return static New instance with the updated `stroke-linecap` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineCaps
     * {@see StrokeLineCap} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->strokeLineCap('round');
     * $element->strokeLineCap(StrokeLineCap::SQUARE);
     * $element->strokeLineCap(null);
     * ```
     */
    public function strokeLineCap(string|StrokeLineCap|null $value): static
    {
        Validator::oneOf($value, StrokeLineCap::cases(), SvgAttribute::STROKE_LINECAP);

        return $this->addAttribute(SvgAttribute::STROKE_LINECAP, $value);
    }
}
