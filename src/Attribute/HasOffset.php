<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

use function is_string;
use function str_ends_with;

/**
 * Trait for managing the SVG `offset` attribute in tag rendering.
 *
 * Provides a method that delegates to `addAttribute()` to set the `offset` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set gradient stop offsets.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `offset` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `offset` attribute.
 * - Supports `float`, `int`, `string`, and `null` for flexible offset assignment (number in the `0`-`1` range, a
 *   percentage in the `0`-`100` range, or unset).
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/offset
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasOffset
{
    /**
     * Sets the SVG `offset` attribute for the element.
     *
     * Creates a new instance with the specified gradient stop offset value for the rendered element.
     *
     * @param float|int|string|null $value Offset value (for example, `0.25`, `'0.5'`, `'50%'`, or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range (`0`-`1`, or `0`-`100%`) and not
     * `null`.
     *
     * @return static New instance with the updated `offset` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#StopElementOffsetAttribute
     *
     * Usage example:
     * ```php
     * $stop->offset(0.25);
     * $stop->offset('50%');
     * $stop->offset(null);
     * ```
     */
    public function offset(float|int|string|null $value): static
    {
        if ($value !== null && Validator::offsetLike($value) === false) {
            $max = (is_string($value) && str_ends_with($value, '%')) ? 100 : 1;

            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, $max),
            );
        }

        return $this->addAttribute(SvgAttribute::OFFSET, $value);
    }
}
