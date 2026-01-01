<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgProperty;

/**
 * Trait for managing SVG `stroke-miterlimit` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting `stroke-miterlimit` attribute on SVG elements, following
 * the SVG 2 specification for painting and stroking graphical content.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of stroke miter limit
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of SVG `stroke-miterlimit` attribute.
 * - Immutable method for setting or overriding the `stroke-miterlimit` attribute.
 * - Supports string and `null` for flexible stroke miter limit assignment (number '>= 1' or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/stroke-miterlimit
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStrokeMiterlimit
{
    /**
     * Sets SVG `stroke-miterlimit` attribute for the element.
     *
     * Creates a new instance with the specified stroke miter limit value, supporting explicit assignment according to
     * the SVG 2 specification for painting and stroking properties.
     *
     * The `stroke-miterlimit` attribute controls the limit on the ratio of the miter length to the stroke-width. When
     * the limit is exceeded, the join is converted from a miter to a bevel. The value must be a number '>= 1'.
     *
     * @param float|int|string|null $value Stroke miter limit value to set for the element. Accepts any valid number
     * '>= 1' or `null` to unset.
     *
     * @throws InvalidArgumentException if value is not a number '>= 1' or `null`.
     *
     * @return static New instance with the updated `stroke-miterlimit` attribute.
     *
     * @link https://svgwg.org/svg2-draft/painting.html#StrokeMiterlimitProperty
     *
     * Usage example:
     * ```php
     * // sets the `stroke-miterlimit` attribute to 4
     * $element->strokeMiterlimit(4);
     *
     * // unsets the `stroke-miterlimit` attribute
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

        return $this->addAttribute(SvgProperty::STROKE_MITERLIMIT, $value);
    }
}
