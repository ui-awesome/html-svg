<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing SVG `fill-opacity` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `fill-opacity` attribute on SVG elements, following the SVG
 * 2 specification for painting and opacity properties.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of fill opacity property,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `fill-opacity` attribute.
 * - Immutable method for setting or overriding the `fill-opacity` attribute.
 * - Supports float, int, string and `null` for flexible fill opacity assignment ('0-1' range or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/fill-opacity
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFillOpacity
{
    /**
     * Sets SVG `fill-opacity` attribute for the element.
     *
     * Creates a new instance with the specified fill opacity value, supporting explicit assignment according to the SVG
     * 2 specification for painting and opacity properties.
     *
     * @param float|int|string|null $value Fill opacity value to set for the element. Accepts any valid opacity value
     * ('0-1' range or `null` to unset).
     *
     * @throws InvalidArgumentException if the value is outside the allowed range ('0-1') and not `null`.
     *
     * @return static New instance with the updated `fill-opacity` attribute.
     *
     * @link https://svgwg.org/svg2-draft/painting.html#FillOpacityProperty
     *
     * Usage example:
     * ```php
     * // sets the `fill-opacity` attribute to '0.5'
     * $element->fillOpacity('0.5');
     *
     * // unsets the `fill-opacity` attribute
     * $element->fillOpacity(null);
     * ```
     */
    public function fillOpacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::FILL_OPACITY, $value);
    }
}
