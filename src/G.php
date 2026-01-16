<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Svg\Attribute\{
    HasFill,
    HasFillOpacity,
    HasFillRule,
    HasOpacity,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeMiterlimit,
    HasStrokeOpacity,
    HasStrokeWidth,
    HasTransform,
};
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Represents the SVG `<g>` (group) element for grouping and transforming SVG content.
 *
 * Provides a standards-compliant, immutable API for rendering the `<g>` container element, following the SVG 2 and HTML
 * specifications for grouping, inheriting attributes, and applying transformations to child elements.
 *
 * The `<g>` element is used to group SVG shapes and other elements, allowing collective transformations, attribute
 * inheritance, and referencing via the `<use>` element. Attributes set on `<g>` are inherited by its children, and any
 * transformation applied to the group affects all contained elements.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform attribute (`transform`) for collective transformations.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/g
 * {@see Base\BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class G extends Base\BaseSvgBlockTag
{
    use HasFill;
    use HasFillOpacity;
    use HasFillRule;
    use HasOpacity;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTransform;

    /**
     * Returns the tag enumeration for the `<g>` element.
     *
     * @return BlockInterface Tag enumeration instance for `<g>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BlockInterface
    {
        return SvgBlock::G;
    }
}
