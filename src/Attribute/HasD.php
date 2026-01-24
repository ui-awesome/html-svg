<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `d` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `d` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set path data.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `d` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `d` attribute.
 * - Supports `string` and `null` for flexible path data assignment (or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/d
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasD
{
    /**
     * Sets the SVG `d` attribute for the element.
     *
     * Creates a new instance with the specified path data value for the rendered element.
     *
     * @param string|null $value Path data string (for example, `'M10 10 H 90 V 90 H 10 Z'`, or `null` to unset).
     *
     * @return static New instance with the updated `d` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/paths.html#DAttribute
     *
     * Usage example:
     * ```php
     * $element->d('M10 10 H 90 V 90 H 10 Z');
     * $element->d(null);
     * ```
     */
    public function d(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::D, $value);
    }
}
