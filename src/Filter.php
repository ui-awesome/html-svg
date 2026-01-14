<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasX, HasY};
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Represents the SVG `<filter>` (filter) element for defining filter effects.
 *
 * Provides a standards-compliant, immutable API for rendering the `<filter>` container element, following the SVG 2 and
 * HTML specifications for defining filter effects.
 *
 * The `<filter>` element defines a filter that can be applied to other elements.
 *
 * Key features.
 * - Designed for use in SVG tag/component classes requiring filter rendering.
 * - Standards-compliant implementation of the SVG `<filter>` element.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/filter
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Filter extends Base\BaseSvgBlockTag
{
    use HasHeight;
    use HasWidth;
    use HasX;
    use HasY;

    /**
     * Sets the `filterUnits` attribute for the `<filter>` element.
     *
     * Creates a new instance with the specified filter units value, supporting explicit assignment according to the
     * HTML specification for SVG attributes.
     *
     * @param string|UnitEnum|null $value Filter units value (for example, "objectBoundingBox" or "userSpaceOnUse").
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
    public function filterUnits(string|UnitEnum|null $value): self
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::FILTER_UNITS);

        return $this->addAttribute(SvgAttribute::FILTER_UNITS, $value);
    }

    /**
     * Sets the `primitiveUnits` attribute for the `<filter>` element.
     *
     * Creates a new instance with the specified filter units value, supporting explicit assignment according to the
     * HTML specification for SVG attributes.
     *
     * @param string|UnitEnum|null $value Primitive units value (for example, "objectBoundingBox" or "userSpaceOnUse").
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
    public function primitiveUnits(string|UnitEnum|null $value): self
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::PRIMITIVE_UNITS);

        return $this->addAttribute(SvgAttribute::PRIMITIVE_UNITS, $value);
    }

    /**
     * Returns the tag enumeration for the `<filter>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<filter>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::FILTER;
    }
}
