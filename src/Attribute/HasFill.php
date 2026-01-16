<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Attribute;

use UIAwesome\Html\Svg\Values\SvgAttribute;

/**
 * Trait for managing the SVG `fill` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `fill` attribute on SVG elements, following the SVG 2
 * specification for painting properties.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of the `fill`
 * property, ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in SVG tag and component classes.
 * - Enforces standards-compliant handling of the SVG `fill` attribute.
 * - Immutable method for setting or overriding the `fill` attribute.
 * - Supports `string` and `null` for flexible fill assignment (color, pattern, gradient, or unset).
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/fill
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasFill
{
    /**
     * Sets the SVG `fill` attribute for the element.
     *
     * Creates a new instance with the specified fill value, supporting explicit assignment according to the SVG 2
     * specification for painting properties.
     *
     * @param string|null $value Fill value (for example, `'red'`, `'url(#gradient1)'`, or `null` to unset).
     *
     * @return static New instance with the updated `fill` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillProperties
     *
     * Usage example:
     * ```php
     * $element->fill('red');
     * $element->fill('url(#gradient1)');
     * $element->fill(null);
     * ```
     */
    public function fill(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FILL, $value);
    }
}
