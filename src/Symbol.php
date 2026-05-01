<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgBlock;
use UIAwesome\Html\Svg\Values\PreserveAspectRatio;
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Represents the SVG `<symbol>` element for reusable symbol definitions.
 *
 * Provides a concrete `<symbol>` element implementation that returns {@see SvgBlock::SYMBOL} and provides view,
 * geometry, reference point, and presentation attribute methods.
 *
 * The `<symbol>` element defines graphical template objects that can be instantiated with the `<use>` element.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Supports geometry attributes (`x`, `y`, `width`, `height`).
 * - Supports presentation attributes (`opacity`).
 * - Supports reference point attributes (`refX`, `refY`).
 * - Supports transform attribute (`transform`).
 * - Supports view attributes (`viewBox`, `preserveAspectRatio`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Symbol;
 *
 * echo Symbol::tag()
 *     ->id('icon-check')
 *     ->viewBox('0 0 16 16')
 *     ->content('<path d="M2 8l4 4 8-8" />')
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/symbol
 * {@see BaseSvgBlockTag} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Symbol extends BaseSvgBlockTag
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
     * Returns the tag enumeration for the `<symbol>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<symbol>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::SYMBOL;
    }
}
