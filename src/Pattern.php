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
use UIAwesome\Html\Svg\Values\PreserveAspectRatio;
use UnitEnum;

/**
 * Represents the SVG `<pattern>` element for defining reusable patterns.
 *
 * Provides a concrete `<pattern>` element implementation that returns {@see SvgBlock::PATTERN} and provides geometry,
 * linking, pattern, and view attribute methods.
 *
 * The `<pattern>` element defines a pattern that can be referenced by `fill` and `stroke` attributes.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports linking attribute (`href`).
 * - Supports pattern-specific attributes (`patternUnits`, `patternContentUnits`, `patternTransform`).
 * - Supports view attributes (`viewBox`, `preserveAspectRatio`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Pattern, Rect};
 *
 * echo Pattern::tag()
 *     ->id('tile')
 *     ->x(0)
 *     ->y(0)
 *     ->width(4)
 *     ->height(4)
 *     ->content(Rect::tag()->x(0)->y(0)->width(4)->height(4)->fill('currentColor'))
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/pattern
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Pattern extends BaseSvgBlockTag
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
     * Sets the `href` attribute.
     *
     * Usage example:
     * ```php
     * $element->href('#pattern');
     * $element->href(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value URL, path, or fragment, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `href` attribute.
     */
    public function href(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(SvgAttribute::HREF, $value);
    }

    /**
     * Sets the SVG `patternContentUnits` attribute for the `<pattern>` element.
     *
     * Creates a new instance with the specified pattern content units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Pattern content units value (for example, 'userSpaceOnUse',
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `patternContentUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#PatternElementPatternContentUnitsAttribute
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->patternContentUnits('userSpaceOnUse');
     * $element->patternContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX);
     * $element->patternContentUnits(null);
     * ```
     */
    public function patternContentUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::PATTERN_CONTENT_UNITS);

        return $this->addAttribute(SvgAttribute::PATTERN_CONTENT_UNITS, $value);
    }

    /**
     * Sets the SVG `patternTransform` attribute for the `<pattern>` element.
     *
     * Creates a new instance with the specified pattern transform value for the rendered element.
     *
     * @param string|null $value Transform value (for example, 'rotate(45)', 'scale(2)', or `null` to unset).
     *
     * @return static New instance with the updated `patternTransform` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#PatternElementPatternTransformAttribute
     *
     * Usage example:
     * ```php
     * $element->patternTransform('rotate(45)');
     * $element->patternTransform('scale(2)');
     * $element->patternTransform(null);
     * ```
     */
    public function patternTransform(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::PATTERN_TRANSFORM, $value);
    }

    /**
     * Sets the SVG `patternUnits` attribute for the `<pattern>` element.
     *
     * Creates a new instance with the specified pattern units value for the rendered element.
     *
     * @param CoordinateUnits|string|null $value Pattern units value (for example, 'objectBoundingBox',
     * {@see CoordinateUnits} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see CoordinateUnits} enum or string.
     *
     * @return static New instance with the updated `patternUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#PatternElementPatternUnitsAttribute
     * {@see CoordinateUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->patternUnits('objectBoundingBox');
     * $element->patternUnits(CoordinateUnits::USER_SPACE_ON_USE);
     * $element->patternUnits(null);
     * ```
     */
    public function patternUnits(CoordinateUnits|string|null $value): static
    {
        Validator::oneOf($value, CoordinateUnits::cases(), SvgAttribute::PATTERN_UNITS);

        return $this->addAttribute(SvgAttribute::PATTERN_UNITS, $value);
    }

    /**
     * Sets the SVG `preserveAspectRatio` attribute for the element.
     *
     * Creates a new instance with the specified preserve aspect ratio value for the rendered element.
     *
     * @param PreserveAspectRatio|string|null $value Preserve aspect ratio value (for example, 'xMidYMid meet',
     * {@see PreserveAspectRatio} enum, or `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see PreserveAspectRatio} enum or string.
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

    /**
     * Sets the SVG `viewBox` attribute for the element.
     *
     * Creates a new instance with the specified view box value for the rendered element.
     *
     * @param string|null $value ViewBox value (for example, '0 0 100 100', or `null` to unset).
     *
     * @return static New instance with the updated `viewBox` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/coords.html#ViewBoxAttribute
     *
     * Usage example:
     * ```php
     * $element->viewBox('0 0 100 100');
     * $element->viewBox('10 10 200 150');
     * $element->viewBox(null);
     * ```
     */
    public function viewBox(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::VIEW_BOX, $value);
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
     * Returns the tag enumeration for the `<pattern>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<pattern>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::PATTERN;
    }
}
