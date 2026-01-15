<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\{Orient, SvgAttribute};

/**
 * Trait for managing the SVG `orient` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `orient` attribute on SVG marker elements, following
 * the SVG 2 specification for defining marker orientation.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the marker orientation
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG marker tag and component classes.
 * - Enforces standards-compliant handling of the SVG `orient` attribute.
 * - Immutable method for setting or overriding the `orient` attribute.
 * - Supports float, int, string, {@see Orient} enum, and `null` for flexible orientation assignment (angle, keyword, or
 *   unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Creates a new instance with the specified orientation value, supporting explicit assignment according to the SVG
     * 2 specification for defining how the marker is rotated when placed at its position on the shape.
     *
     * @param float|int|Orient|string|null $value Orient value to set for the element. Accepts 'auto',
     * 'auto-start-reverse', {@see Orient} enum, numeric angle (for example, '45', '90', '45.5'), or `null` to unset.
     *
     * @return static New instance with the updated `orient` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementOrientAttribute
     * {@see Orient} for predefined keyword enum values.
     *
     * Usage example:
     * ```php
     * // sets the `orient` attribute to 'auto'
     * $element->orient('auto');
     *
     * // sets the `orient` attribute using an enum
     * $element->orient(Orient::AUTO_START_REVERSE);
     *
     * // sets the `orient` attribute to a numeric angle
     * $element->orient(45);
     * $element->orient('90deg');
     *
     * // unsets the `orient` attribute
     * $element->orient(null);
     * ```
     */
    public function orient(float|int|Orient|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::ORIENT, $value);
    }
}
