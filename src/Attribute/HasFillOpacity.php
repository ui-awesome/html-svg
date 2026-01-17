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
 * Provides a method that delegates to `addAttribute()` to set the `fill-opacity` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set fill opacity.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `fill-opacity` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `fill-opacity` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible fill opacity assignment (`0`-`1` range or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fill-opacity
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFillOpacity
{
    /**
     * Sets SVG `fill-opacity` attribute for the element.
     *
     * Creates a new instance with the specified fill opacity value for the rendered element.
     *
     * @param float|int|string|null $value Fill opacity value (for example, `'0.5'`, `0.5`, or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range (`0`-`1`) and not `null`.
     *
     * @return static New instance with the updated `fill-opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillOpacity
     *
     * Usage example:
     * ```php
     * $element->fillOpacity('0.5');
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
