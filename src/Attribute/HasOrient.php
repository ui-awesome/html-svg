<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\{Orient, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing the SVG `orient` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `orient` attribute on SVG marker elements.
 *
 * Intended for use in SVG tag and component classes that set marker orientation.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `orient` attribute.
 * - Designed for use in SVG marker tag and component classes.
 * - Immutable method for setting or overriding the `orient` attribute.
 * - Supports `float`, `int`, `string`, {@see Orient} enum, and `null` for flexible orientation assignment (angle,
 *   keyword, or unset).
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/orient
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasOrient
{
    /**
     * Sets the SVG `orient` attribute for the marker element.
     *
     * Creates a new instance with the specified orientation value for the rendered element.
     *
     * @param float|int|Orient|string|null $value Orient value (for example, `'auto'`, {@see Orient} enum, `45`,
     * or `null` to unset).
     *
     * @return static New instance with the updated `orient` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementOrientAttribute
     * {@see Orient} for predefined keyword enum values.
     *
     * Usage example:
     * ```php
     * $element->orient('auto');
     * $element->orient(Orient::AUTO_START_REVERSE);
     * $element->orient(null);
     * ```
     */
    public function orient(float|int|Orient|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::ORIENT, $value);
    }
}
