<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasTransform};
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};
use UnitEnum;

/**
 * Represents the SVG `<clipPath>` (clipping path) element for defining clipping paths.
 *
 * Provides a standards-compliant, immutable API for rendering the `<clipPath>` container element, following the SVG 2
 * and HTML specifications for defining clipping paths that restrict the visibility of parts of SVG elements.
 *
 * The `<clipPath>` element is used to define a clipping path that can be applied to other SVG elements using the
 * `clip-path` property. The content within a `<clipPath>` defines the area that will be visible when the clipping path
 * is applied.
 *
 * Key features:
 * - Allows specification of {@see clipPathUnits()} to define coordinate system for clipping path.
 * - Designed for use in SVG tag class requiring clipping path definitions.
 * - Standards-compliant implementation of the SVG `<clipPath>` container element.
 * - Supports opacity and transform attributes.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/clipPath
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ClipPath extends Base\BaseSvgBlockTag
{
    use HasOpacity;
    use HasTransform;

    /**
     * Sets the `clipPathUnits` attribute for the `<clipPath>` element.
     *
     * Creates a new instance with the specified clip path units value, supporting explicit assignment according to the
     * HTML specification for SVG attributes.
     *
     * @param string|UnitEnum|null $value Clip path units value (for example, "objectBoundingBox" or "userSpaceOnUse").
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
    public function clipPathUnits(string|UnitEnum|null $value): self
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::CLIP_PATH_UNITS);

        return $this->addAttribute(SvgAttribute::CLIP_PATH_UNITS, $value);
    }

    /**
     * Returns the tag enumeration for the `<clipPath>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<clipPath>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::CLIP_PATH;
    }
}
