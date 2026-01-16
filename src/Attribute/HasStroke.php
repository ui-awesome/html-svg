<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `stroke` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `stroke` attribute on SVG elements, following the SVG 2
 * specification for painting and stroking graphical content.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the stroke
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `stroke` attribute.
 * - Immutable method for setting or overriding the `stroke` attribute.
 * - Supports `string` and `null` for flexible stroke assignment (color, pattern, or none).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStroke
{
    /**
     * Sets the SVG `stroke` attribute for the element.
     *
     * Creates a new instance with the specified stroke value, supporting explicit assignment according to the SVG 2
     * specification for painting outlines of shapes and text content elements.
     *
     * @param string|null $value Stroke paint value (for example, `'black'`, `'url(#gradient1)'`, or `null` to unset).
     *
     * @return static New instance with the updated `stroke` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeProperty
     *
     * Usage example:
     * ```php
     * $element->stroke('black');
     * $element->stroke('url(#gradient1)');
     * $element->stroke(null);
     * ```
     */
    public function stroke(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE, $value);
    }
}
