<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `d` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `d` attribute on SVG elements, following the SVG 2
 * specification for defining the path data string used to draw paths.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of path data, ensuring
 * correct attribute handling and predictable rendering.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `d` attribute.
 * - Immutable method for setting or overriding the `d` attribute.
 * - Supports string and `null` for flexible path data assignment (or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/d
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasD
{
    /**
     * Sets the SVG `d` attribute for the element.
     *
     * Creates a new instance with the specified path data value, supporting explicit assignment according to the SVG 2
     * specification for defining the path data string.
     *
     * @param string|null $value Path data string to set for the element. Accepts a valid SVG path data string or `null`
     * to unset.
     *
     * @return static New instance with the updated `d` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/paths.html#DAttribute
     *
     * Usage example:
     * ```php
     * // sets the `d` attribute
     * $element->d('M10 10 H 90 V 90 H 10 Z');
     *
     * // unsets the `d` attribute
     * $element->d(null);
     * ```
     */
    public function d(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::D, $value);
    }
}
