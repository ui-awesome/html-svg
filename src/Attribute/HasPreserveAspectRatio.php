<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Values\{PreserveAspectRatio, SvgAttribute};
use UnitEnum;

/**
 * Trait for managing the SVG `preserveAspectRatio` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `preserveAspectRatio` attribute on SVG elements,
 * following the SVG 2 specification for preserving aspect ratio when scaling SVG content.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the preserve aspect
 * ratio property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `preserveAspectRatio` attribute.
 * - Immutable method for setting or overriding the `preserveAspectRatio` attribute.
 * - Supports string, UnitEnum, and `null` for flexible preserve aspect ratio assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/preserveAspectRatio
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPreserveAspectRatio
{
    /**
     * Sets the SVG `preserveAspectRatio` attribute for the element.
     *
     * Creates a new instance with the specified preserve aspect ratio value, supporting explicit assignment according
     * to the SVG 2 specification for preserving aspect ratio when scaling SVG content to fit a viewport with a
     * different aspect ratio.
     *
     * @param string|UnitEnum|null $value Preserve aspect ratio value. Accepts any valid preserveAspectRatio
     * specification (for example, 'xMidYMid meet', 'none', 'xMaxYMax slice', {@see PreserveAspectRatio} enum, or `null`
     * to unset).
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see PreserveAspectRatio} enum or string.
     *
     * @return static New instance with the updated `preserveAspectRatio` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#PreserveAspectRatioAttribute
     * {@see PreserveAspectRatio} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `preserveAspectRatio` attribute to 'xMidYMid meet' (default)
     * $element->preserveAspectRatio('xMidYMid meet');
     *
     * // sets the `preserveAspectRatio` attribute to 'none' for non-uniform scaling
     * $element->preserveAspectRatio('none');
     *
     * // sets the `preserveAspectRatio` attribute to 'xMaxYMax slice' using enum
     * $element->preserveAspectRatio(PreserveAspectRatio::X_MAX_Y_MAX_SLICE);
     *
     * // unsets the `preserveAspectRatio` attribute
     * $element->preserveAspectRatio(null);
     * ```
     */
    public function preserveAspectRatio(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, PreserveAspectRatio::cases(), SvgAttribute::PRESERVE_ASPECT_RATIO);

        return $this->addAttribute(SvgAttribute::PRESERVE_ASPECT_RATIO, $value);
    }
}
