<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing SVG `stroke-opacity` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `stroke-opacity` attribute on SVG elements, following the
 * SVG 2 specification for painting and opacity properties.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of stroke opacity
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `stroke-opacity` attribute.
 * - Immutable method for setting or overriding the `stroke-opacity` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible stroke opacity assignment (object or group opacity, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-opacity
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeOpacity
{
    /**
     * Sets SVG `stroke-opacity` attribute for the element.
     *
     * Creates a new instance with the specified stroke opacity value, supporting explicit assignment according to the
     * SVG 2 specification for painting and opacity properties.
     *
     * @param float|int|string|null $value Stroke opacity value (for example, `0.8`, `'0.6'`, or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range (`0`-`1`) and not `null`.
     *
     * @return static New instance with the updated `stroke-opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeOpacityProperty
     *
     * Usage example:
     * ```php
     * $element->strokeOpacity(0.8);
     * $element->strokeOpacity('0.6');
     * $element->strokeOpacity(null);
     * ```
     */
    public function strokeOpacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::STROKE_OPACITY, $value);
    }
}
