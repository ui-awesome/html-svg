<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{StrokeLineCap, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing the SVG `stroke-linecap` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `stroke-linecap` attribute on SVG elements, following
 * the SVG 2 specification for controlling the shape of the ends of open subpaths when they are stroked.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the stroke line cap
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `stroke-linecap` attribute.
 * - Immutable method for setting or overriding the `stroke-linecap` attribute.
 * - Supports string, UnitEnum, and `null` for flexible cap assignment ('butt', 'round', 'square', or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke-linecap
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeLineCap
{
    /**
     * Sets the SVG `stroke-linecap` attribute for the element.
     *
     * Creates a new instance with the specified stroke line cap value, supporting explicit assignment according to the
     * SVG 2 specification for painting outlines of shapes and text content elements.
     *
     * @param string|UnitEnum|null $value Stroke line cap style to set for the element. Accepts 'butt', 'round',
     * 'square', {@see StrokeLineCap} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see StrokeLineCap} enum or string.
     *
     * @return static New instance with the updated `stroke-linecap` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineCaps
     * {@see StrokeLineCap} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `stroke-linecap` attribute to 'round'
     * $element->strokeLineCap('round');
     *
     * // sets the `stroke-linecap` attribute to 'square' using enum
     * $element->strokeLineCap(StrokeLineCap::SQUARE);
     *
     * // unsets the `stroke-linecap` attribute
     * $element->strokeLineCap(null);
     * ```
     */
    public function strokeLineCap(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, StrokeLineCap::cases(), SvgAttribute::STROKE_LINECAP);

        return $this->addAttribute(SvgAttribute::STROKE_LINECAP, $value);
    }
}
