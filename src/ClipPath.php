<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Represents the SVG `<clipPath>` (clipping path) element for defining clipping paths.
 *
 * Provides a concrete `<clipPath>` element implementation that returns {@see SvgBlock::CLIP_PATH} and provides opacity
 * and transform attribute methods.
 *
 * The `<clipPath>` element defines a clipping path that can be applied to other SVG elements via the `clip-path`
 * property.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports coordinate system attribute (`clipPathUnits`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform attribute (`transform`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{ClipPath, Circle};
 *
 * $shape = Circle::tag()
 *     ->cx(50)
 *     ->cy(50)
 *     ->r(40)
 *     ->fill('currentColor')
 *     ->render();
 *
 * echo ClipPath::tag()->id('clip')->content($shape)->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/clipPath
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ClipPath extends BaseSvgBlockTag
{
    /**
     * Sets the `clipPathUnits` attribute for the `<clipPath>` element.
     *
     * Creates a new instance with the specified clip path units value for the rendered `<clipPath>` element.
     *
     * @param CoordinateUnits|string|null $value Clip path units value (for example, 'objectBoundingBox' or
     * 'userSpaceOnUse').
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `clipPathUnits` property.
     *
     * @link https://drafts.csswg.org/css-masking-1/#element-attrdef-clippath-clippathunits
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * // sets the `clipPathUnits` attribute to 'userSpaceOnUse'
     * $element->clipPathUnits('userSpaceOnUse');
     *
     * // sets the `clipPathUnits` attribute using enum
     * $element->clipPathUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * ```
     */
    public function clipPathUnits(CoordinateUnits|string|null $value): self
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::CLIP_PATH_UNITS);

        return $this->addAttribute(SvgAttribute::CLIP_PATH_UNITS, $value);
    }
    /**
     * Sets the SVG `opacity` attribute for the element.
     *
     * Creates a new instance with the specified opacity value for the rendered element.
     *
     * @param float|int|string|null $value Opacity value (for example, '0.5', or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range ('0'-'1') and not `null`.
     *
     * @return static New instance with the updated `opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/render.html#ObjectAndGroupOpacityProperties
     *
     * Usage example:
     * ```php
     * $element->opacity(0.5);
     * $element->opacity('0.75');
     * $element->opacity(null);
     * ```
     */
    public function opacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::OPACITY, $value);
    }

    /**
     * Sets the SVG `transform` attribute for the element.
     *
     * Creates a new instance with the specified transform value for the rendered element.
     *
     * @param string|null $value Transform value (for example, 'rotate(45)', 'scale(2)', or `null` to unset).
     *
     * @return static New instance with the updated `transform` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#TransformProperty
     *
     * Usage example:
     * ```php
     * $element->transform('rotate(45)');
     * $element->transform('scale(2)');
     * $element->transform(null);
     * ```
     */
    public function transform(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::TRANSFORM, $value);
    }

    /**
     * Returns the tag enumeration for the `<clipPath>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<clipPath>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::CLIP_PATH;
    }
}
