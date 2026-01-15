<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `viewBox` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `viewBox` attribute on SVG elements, following the SVG
 * 2 specification for defining the position and dimension of an SVG viewport.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the view box property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `viewBox` attribute.
 * - Immutable method for setting or overriding the `viewBox` attribute.
 * - Supports string and `null` for flexible viewport assignment (specific value or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/viewBox
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasViewBox
{
    /**
     * Sets the SVG `viewBox` attribute for the element.
     *
     * Creates a new instance with the specified view box value, supporting explicit assignment according to the SVG 2
     * specification for defining the position and dimension of an SVG viewport in user space.
     *
     * @param string|null $value ViewBox value to set for the element. Accepts any valid viewBox specification (for
     * example, '0 0 100 100', '10 10 200 150', or `null` to unset).
     *
     * @return static New instance with the updated `viewBox` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#ViewBoxAttribute
     *
     * Usage example:
     * ```php
     * // sets the `viewBox` attribute to '0 0 100 100'
     * $element->viewBox('0 0 100 100');
     *
     * // sets the `viewBox` attribute to a custom viewport
     * $element->viewBox('10 10 200 150');
     *
     * // unsets the `viewBox` attribute
     * $element->viewBox(null);
     * ```
     */
    public function viewBox(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::VIEW_BOX, $value);
    }
}
