<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\{MarkerUnits, Orient, SvgAttribute};
use UIAwesome\Html\Svg\Values\PreserveAspectRatio;

/**
 * Represents the SVG `<marker>` element for defining arrowheads and other markers.
 *
 * Provides a concrete `<marker>` element implementation that returns {@see SvgBlock::MARKER} and provides marker, view,
 * and presentation attribute methods.
 *
 * The `<marker>` element defines a marker that can be attached to lines, polylines, and polygons.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports marker attributes (`markerWidth`, `markerHeight`, `markerUnits`, `orient`, `refX`, `refY`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform attribute (`transform`).
 * - Supports view attributes (`viewBox`, `preserveAspectRatio`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Marker, Path};
 *
 * echo Marker::tag()
 *     ->id('arrow')
 *     ->viewBox('0 0 10 10')
 *     ->refX(10)->refY(5)
 *     ->markerWidth(6)->markerHeight(6)
 *     ->orient('auto')
 *     ->content(Path::tag()->d('M0 0 L10 5 L0 10 z')->fill('currentColor'))
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/marker
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Marker extends BaseSvgBlockTag
{
    /**
     * Sets the SVG `markerHeight` attribute for the marker element.
     *
     * Creates a new instance with the specified marker height value for the rendered element.
     *
     * @param float|int|string|null $value Marker height value (for example, '3', '10%', or `null` to unset).
     *
     * @return static New instance with the updated `markerHeight` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerHeightAttribute
     *
     * Usage example:
     * ```php
     * $element->markerHeight(3);
     * $element->markerHeight('10%');
     * $element->markerHeight(null);
     * ```
     */
    public function markerHeight(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::MARKER_HEIGHT, $value);
    }

    /**
     * Sets the SVG `markerUnits` attribute for the marker element.
     *
     * Creates a new instance with the specified marker units value for the rendered element.
     *
     * @param MarkerUnits|string|null $value Marker units value (for example, 'strokeWidth', {@see MarkerUnits} enum, or
     * `null` to unset).
     *
     * @throws InvalidArgumentException If the provided value is not a valid {@see MarkerUnits} enum or string.
     *
     * @return static New instance with the updated `markerUnits` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerUnitsAttribute
     * {@see MarkerUnits} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->markerUnits('strokeWidth');
     * $element->markerUnits(MarkerUnits::USER_SPACE_ON_USE);
     * $element->markerUnits(null);
     * ```
     */
    public function markerUnits(MarkerUnits|string|null $value): static
    {
        Validator::oneOf($value, MarkerUnits::cases(), SvgAttribute::MARKER_UNITS);

        return $this->addAttribute(SvgAttribute::MARKER_UNITS, $value);
    }

    /**
     * Sets the SVG `markerWidth` attribute for the marker element.
     *
     * Creates a new instance with the specified marker width value for the rendered element.
     *
     * @param float|int|string|null $value Marker width value (for example, '3', '10%', or `null` to unset).
     *
     * @return static New instance with the updated `markerWidth` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementMarkerWidthAttribute
     *
     * Usage example:
     * ```php
     * $element->markerWidth(3);
     * $element->markerWidth('10%');
     * $element->markerWidth(null);
     * ```
     */
    public function markerWidth(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::MARKER_WIDTH, $value);
    }

    /**
     * Sets the SVG `opacity` attribute for the element.
     *
     * Creates a new instance with the specified opacity value for the rendered element.
     *
     * @param float|int|string|null $value Opacity value (for example, '0.5' or `null` to unset).
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
     * Sets the SVG `orient` attribute for the marker element.
     *
     * Creates a new instance with the specified orientation value for the rendered element.
     *
     * @param float|int|Orient|string|null $value Orient value (for example, 'auto', {@see Orient} enum, '45', or `null`
     * to unset).
     *
     * @return static New instance with the updated `orient` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementOrientAttribute
     * {@see Orient} for predefined keyword enum values.
     *
     * Usage example:
     * ```php
     * $element->orient('auto');
     * $element->orient(Orient::AUTO_START_REVERSE);
     * $element->orient(null);
     * ```
     */
    public function orient(float|int|Orient|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::ORIENT, $value);
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
     * Sets the SVG `refX` attribute for the marker element.
     *
     * Creates a new instance with the specified reference x coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Reference x coordinate value (for example, '0', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `refX` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementRefXAttribute
     *
     * Usage example:
     * ```php
     * $element->refX(0);
     * $element->refX('50%');
     * $element->refX(null);
     * ```
     */
    public function refX(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::REF_X, $value);
    }

    /**
     * Sets the SVG `refY` attribute for the marker element.
     *
     * Creates a new instance with the specified reference y coordinate value for the rendered element.
     *
     * @param float|int|string|null $value Reference y coordinate value (for example, '0', '50%', or `null` to unset).
     *
     * @return static New instance with the updated `refY` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#MarkerElementRefYAttribute
     *
     * Usage example:
     * ```php
     * $element->refY(0);
     * $element->refY('50%');
     * $element->refY(null);
     * ```
     */
    public function refY(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::REF_Y, $value);
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
     * Returns the tag enumeration for the `<marker>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<marker>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::MARKER;
    }
}
