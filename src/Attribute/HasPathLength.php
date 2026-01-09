<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgProperty;

/**
 * Trait for managing the SVG `pathLength` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `pathLength` attribute on SVG elements, following the
 * SVG 2 specification for defining the total length for the path in user units.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the path length
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `pathLength` attribute.
 * - Immutable method for setting or overriding the `pathLength` attribute.
 * - Supports float, int, string, and `null` for flexible path length assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/pathLength
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPathLength
{
    /**
     * Sets the SVG `pathLength` attribute for the element.
     *
     * Creates a new instance with the specified path length value, supporting explicit assignment according to the SVG
     * 2 specification for defining the total length for the path in user units.
     *
     * @param float|int|string|null $value Path length value to set for the element. Accepts any valid number or `null`
     * to unset (for example, '100', '50.5', or `null`).
     *
     * @throws InvalidArgumentException If the provided value is not a positive number or `null`.
     *
     * @return static New instance with the updated `pathLength` attribute.
     *
     * @link https://svgwg.org/svg2-draft/paths.html#PathLengthAttribute
     *
     * Usage example:
     * ```php
     * // sets the `pathLength` attribute to 100 user units
     * $element->pathLength(100);
     *
     * // sets the `pathLength` attribute to a float value
     * $element->pathLength(50.5);
     *
     * // unsets the `pathLength` attribute
     * $element->pathLength(null);
     * ```
     */
    public function pathLength(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL->getMessage(),
            );
        }

        return $this->addAttribute(SvgProperty::PATH_LENGTH, $value);
    }
}
