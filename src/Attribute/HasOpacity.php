<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgProperty;

/**
 * Trait for managing the SVG `opacity` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `opacity` attribute on SVG elements, following the
 * SVG 2 and HTML specifications for controlling the transparency of graphical and container elements.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the opacity property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features:
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `opacity` attribute.
 * - Immutable method for setting or overriding the `opacity` attribute.
 * - Supports float, int, string, and `null` for flexible opacity assignment (object or group opacity, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/opacity
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasOpacity
{
    /**
     * Sets the SVG `opacity` attribute for the element.
     *
     * Creates a new instance with the specified opacity value, supporting explicit assignment according to the SVG 2
     * specification for object and group opacity, which controls the transparency of the element or group when painted
     * to the canvas.
     *
     * @param float|int|string|null $value Opacity value to set for the element. Accepts any valid SVG opacity value
     * (for example, `0.0`–`1.0`, float, integer, string, or `null` to unset).
     *
     * @throws InvalidArgumentException if the value is outside the allowed range ('0-1') and not `null`.
     *
     * @return static New instance with the updated `opacity` attribute.
     *
     * @link https://svgwg.org/svg2-draft/render.html#ObjectAndGroupOpacityProperties
     *
     * Usage example:
     * ```php
     * // sets the `opacity` attribute to 0.5
     * $element->opacity(0.5);
     *
     * // sets the `opacity` attribute to '0.75'
     * $element->opacity('0.75');
     *
     * // unsets the `opacity` attribute
     * $element->opacity(null);
     * ```
     */
    public function opacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgProperty::OPACITY, $value);
    }
}
