<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing the SVG `viewBox` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `viewBox` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set the view box.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `viewBox` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `viewBox` attribute.
 * - Supports `string` and `null` for flexible viewport assignment (specific value or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified view box value for the rendered element.
     *
     * @param string|null $value ViewBox value (for example, `'0 0 100 100'`, or `null` to unset).
     *
     * @return static New instance with the updated `viewBox` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#ViewBoxAttribute
     *
     * Usage example:
     * ```php
     * $element->viewBox('0 0 100 100');
     * $element->viewBox('10 10 200 150');
     * $element->viewBox(null);
     * ```
     */
    public function viewBox(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::VIEW_BOX, $value);
    }
}
