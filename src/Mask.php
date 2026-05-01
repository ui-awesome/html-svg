<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, MaskType, SvgAttribute};
use UnitEnum;

/**
 * Represents the SVG `<mask>` element for defining masking regions.
 *
 * Provides a concrete `<mask>` element implementation that returns {@see SvgBlock::MASK} and provides mask and geometry
 * attribute methods.
 *
 * The `<mask>` element defines a mask that can be applied to other elements.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports mask-specific attributes (`maskUnits`, `maskContentUnits`, `mask-type`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Mask, Rect};
 * use UIAwesome\Html\Svg\Values\MaskType;
 *
 * echo Mask::tag()
 *     ->id('fade')
 *     ->maskType(MaskType::LUMINANCE)
 *     ->content(Rect::tag()->x(0)->y(0)->width(100)->height(100)->fill('currentColor'))
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/mask
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Mask extends BaseSvgBlockTag
{
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
     * Sets the SVG `maskContentUnits` attribute for the `<mask>` element.
     *
     * Creates a new instance with the specified mask content units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Mask content units value (for example, 'userSpaceOnUse',
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `maskContentUnits` attribute.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-maskcontentunits
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->maskContentUnits('userSpaceOnUse');
     * $element->maskContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * $element->maskContentUnits(null);
     * ```
     */
    public function maskContentUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::MASK_CONTENT_UNITS);

        return $this->addAttribute(SvgAttribute::MASK_CONTENT_UNITS, $value);
    }

    /**
     * Sets the SVG `mask-type` attribute for the `<mask>` element.
     *
     * Creates a new instance with the specified mask type value for the rendered element.
     *
     * @param MaskType|string|null $value Mask type value to set for the element. Accepts 'alpha', 'luminance',
     * {@see MaskType} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see MaskType} enum or string.
     *
     * @return static New instance with the updated `mask-type` attribute.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-mask-type
     * {@see MaskType} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->maskType('luminance');
     * $element->maskType(MaskType::ALPHA);
     * $element->maskType(null);
     * ```
     */
    public function maskType(MaskType|string|null $value): static
    {
        Validator::oneOf($value, MaskType::cases(), SvgAttribute::MASK_TYPE);

        return $this->addAttribute(SvgAttribute::MASK_TYPE, $value);
    }

    /**
     * Sets the SVG `maskUnits` attribute for the `<mask>` element.
     *
     * Creates a new instance with the specified mask units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Mask units value (for example, 'objectBoundingBox',
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `maskUnits` attribute.
     *
     * @link https://drafts.csswg.org/css-masking/#element-attrdef-mask-maskunits
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->maskUnits('objectBoundingBox');
     * $element->maskUnits(CoordinateUnits::USER_SPACE_ON_USE);
     * $element->maskUnits(null);
     * ```
     */
    public function maskUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::MASK_UNITS);

        return $this->addAttribute(SvgAttribute::MASK_UNITS, $value);
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
     * Returns the tag enumeration for the `<mask>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<mask>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::MASK;
    }
}
