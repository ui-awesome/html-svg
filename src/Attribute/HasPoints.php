<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `points` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `points` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set point lists.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Delegates to `addAttribute()` for the `points` attribute.
 * - Immutable method for setting or overriding the `points` attribute.
 * - Supports `string` and `null` for flexible point list assignment (or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/points
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPoints
{
    /**
     * Sets the SVG `points` attribute for the element.
     *
     * Creates a new instance with the specified list of points value for the rendered element.
     *
     * @param string|null $value List of points (for example, `'0,0 10,10 20,0'`, or `null` to unset).
     *
     * @return static New instance with the updated `points` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/shapes.html#PolylineElementPointsAttribute
     *
     * Usage example:
     * ```php
     * $element->points('0,100 50,25 50,75 100,0');
     * $element->points(null);
     * ```
     */
    public function points(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::POINTS, $value);
    }
}
