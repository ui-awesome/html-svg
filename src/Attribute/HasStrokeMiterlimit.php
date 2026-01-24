<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Trait for managing SVG `stroke-miterlimit` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `stroke-miterlimit` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set stroke miter limit values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `stroke-miterlimit` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `stroke-miterlimit` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible stroke miter limit assignment (number `>= 1` or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/stroke-miterlimit
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeMiterlimit
{
    /**
     * Sets SVG `stroke-miterlimit` attribute for the element.
     *
     * Creates a new instance with the specified stroke miter limit value for the rendered element.
     *
     * The `stroke-miterlimit` attribute controls the limit on the ratio of the miter length to the stroke width. When
     * the limit is exceeded, the join is converted from a miter to a bevel. The value must be a number `>= 1`.
     *
     * @param float|int|string|null $value Stroke miter limit value (for example, `4`, `'10'`, or `null` to unset).
     *
     * @throws InvalidArgumentException If value is not a number `>= 1` or `null`.
     *
     * @return static New instance with the updated `stroke-miterlimit` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeMiterlimitProperty
     *
     * Usage example:
     * ```php
     * $element->strokeMiterlimit(4);
     * $element->strokeMiterlimit(null);
     * ```
     */
    public function strokeMiterlimit(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
            );
        }

        return $this->addAttribute(SvgAttribute::STROKE_MITERLIMIT, $value);
    }
}
