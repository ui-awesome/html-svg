<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Represents the SVG `<filter>` (filter) element for defining filter effects.
 *
 * Provides a concrete `<filter>` element implementation that returns {@see SvgBlock::FILTER} and provides filter and
 * geometry attribute methods.
 *
 * The `<filter>` element defines a filter that can be applied to other elements.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports filter-specific attributes (`filterUnits`, `primitiveUnits`).
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Filter;
 *
 * echo Filter::tag()
 *     ->id('shadow')
 *     ->content('<feDropShadow dx="0" dy="2" stdDeviation="2" flood-opacity="0.25" />')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/filter
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Filter extends BaseSvgBlockTag
{
    /**
     * Sets the `filterUnits` attribute for the `<filter>` element.
     *
     * Creates a new instance with the specified filter units value for the rendered `<filter>` element.
     *
     * @param CoordinateUnits|string|null $value Filter units value (for example, 'objectBoundingBox' or
     * 'userSpaceOnUse').
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `filterUnits` property.
     *
     * @link https://drafts.csswg.org/filter-effects-1/#element-attrdef-filter-filterunits
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `filterUnits` attribute to 'userSpaceOnUse'
     * $element->filterUnits('userSpaceOnUse');
     *
     * // sets the `filterUnits` attribute using enum
     * $element->filterUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * ```
     */
    public function filterUnits(CoordinateUnits|string|null $value): self
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::FILTER_UNITS);

        return $this->addAttribute(SvgAttribute::FILTER_UNITS, $value);
    }

    /**
     * Sets the `height` attribute.
     *
     * Usage example:
     * ```php
     * $element->height(200);
     * $element->height('50%');
     * $element->height('auto');
     * ```
     *
     * @param int|string|Stringable|UnitEnum|null $value Height value in pixels or CSS units, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `height` attribute.
     */
    public function height(int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(SvgAttribute::HEIGHT, $value);
    }

    /**
     * Sets the `primitiveUnits` attribute for the `<filter>` element.
     *
     * Creates a new instance with the specified primitive units value for the rendered `<filter>` element.
     *
     * @param CoordinateUnits|string|null $value Primitive units value (for example, 'objectBoundingBox' or
     * 'userSpaceOnUse').
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `primitiveUnits` property.
     *
     * @link https://drafts.csswg.org/filter-effects-1/#element-attrdef-filter-primitiveunits
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `primitiveUnits` attribute to 'userSpaceOnUse'
     * $element->primitiveUnits('userSpaceOnUse');
     *
     * // sets the `primitiveUnits` attribute using enum
     * $element->primitiveUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * ```
     */
    public function primitiveUnits(CoordinateUnits|string|null $value): self
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::PRIMITIVE_UNITS);

        return $this->addAttribute(SvgAttribute::PRIMITIVE_UNITS, $value);
    }

    /**
     * Sets the `width` attribute.
     *
     * Usage example:
     * ```php
     * $element->width(400);
     * $element->width('50%');
     * $element->width('auto');
     * $element->width(null);
     * ```
     *
     * @param int|string|Stringable|UnitEnum|null $value Width value in pixels or CSS units, or `null` to remove the
     * attribute.
     *
     * @return static New instance with the updated `width` attribute.
     */
    public function width(int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(SvgAttribute::WIDTH, $value);
    }
    /**
     * Sets the SVG `x` attribute for the element.
     *
     * Creates a new instance with the specified x-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value X coordinate value (for example, '10', '10.3', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `x` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#XProperty
     *
     * Usage example:
     * ```php
     * $element->x(10);
     * $element->x('50%');
     * $element->x(null);
     * ```
     */
    public function x(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::X, $value);
    }

    /**
     * Sets the SVG `y` attribute for the element.
     *
     * Creates a new instance with the specified y-coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Y coordinate value (for example, '20', '10.3', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `y` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/geometry.html#YProperty
     *
     * Usage example:
     * ```php
     * $element->y(20);
     * $element->y('50%');
     * $element->y(null);
     * ```
     */
    public function y(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::Y, $value);
    }

    /**
     * Returns the tag enumeration for the `<filter>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<filter>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::FILTER;
    }
}
