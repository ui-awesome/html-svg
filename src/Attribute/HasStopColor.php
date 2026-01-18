<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `stop-color` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `stop-color` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set gradient stop colors.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `stop-color` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `stop-color` attribute.
 * - Supports `string` and `null` for flexible color assignment (color value, `currentColor`, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stop-color
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStopColor
{
    /**
     * Sets the SVG `stop-color` attribute for the element.
     *
     * Creates a new instance with the specified gradient stop color value for the rendered element.
     *
     * @param string|null $value Stop color value (for example, `'#ff0000'`, `'currentColor'`, or `null` to unset).
     *
     * @return static New instance with the updated `stop-color` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#StopColorProperty
     *
     * Usage example:
     * ```php
     * $stop->stopColor('#ff0000');
     * $stop->stopColor('currentColor');
     * $stop->stopColor(null);
     * ```
     */
    public function stopColor(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STOP_COLOR, $value);
    }
}
