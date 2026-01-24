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
 * Provides a method that delegates to `addAttribute()` to set the `preserveAspectRatio` attribute on SVG elements.
 *
 * Intended for use in SVG tag and component classes that set preserve aspect ratio values.
 *
 * Key features.
 * - Delegates to `addAttribute()` for the `preserveAspectRatio` attribute.
 * - Designed for use in SVG tag and component classes.
 * - Immutable method for setting or overriding the `preserveAspectRatio` attribute.
 * - Supports `string`, {@see PreserveAspectRatio} enum, and `null` for flexible preserve aspect ratio assignment
 *   (specific value or unset).
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/preserveAspectRatio
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPreserveAspectRatio
{
    /**
     * Sets the SVG `preserveAspectRatio` attribute for the element.
     *
     * Creates a new instance with the specified preserve aspect ratio value for the rendered element.
     *
     * @param PreserveAspectRatio|string|null $value Preserve aspect ratio value (for example, `'xMidYMid meet'`,
     * {@see PreserveAspectRatio} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see PreserveAspectRatio} enum or `string`.
     *
     * @return static New instance with the updated `preserveAspectRatio` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#PreserveAspectRatioAttribute
     * {@see PreserveAspectRatio} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->preserveAspectRatio('xMidYMid meet');
     * $element->preserveAspectRatio(PreserveAspectRatio::X_MAX_Y_MAX_SLICE);
     * $element->preserveAspectRatio(null);
     * ```
     */
    public function preserveAspectRatio(PreserveAspectRatio|string|null $value): static
    {
        Validator::oneOf($value, PreserveAspectRatio::cases(), SvgAttribute::PRESERVE_ASPECT_RATIO);

        return $this->addAttribute(SvgAttribute::PRESERVE_ASPECT_RATIO, $value);
    }
}
