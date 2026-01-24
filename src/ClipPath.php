<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{HasOpacity, HasTransform};
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Represents the SVG `<clipPath>` (clipping path) element for defining clipping paths.
 *
 * Provides a concrete `<clipPath>` element implementation that returns `SvgBlock::CLIP_PATH` and mixes in opacity and
 * transform attribute traits.
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
 * $shape = Circle::tag()->cx(50)->cy(50)->r(40)->fill('currentColor')->render();
 *
 * echo ClipPath::tag()->id('clip')->content($shape)->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/clipPath
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ClipPath extends BaseSvgBlockTag
{
    use HasOpacity;
    use HasTransform;

    /**
     * Sets the `clipPathUnits` attribute for the `<clipPath>` element.
     *
     * Creates a new instance with the specified clip path units value for the rendered `<clipPath>` element.
     *
     * @param CoordinateUnits|string|null $value Clip path units value (for example, "objectBoundingBox" or
     * "userSpaceOnUse").
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
