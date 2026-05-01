<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgVoid;
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Represents the SVG `<use>` (use) element for referencing and reusing SVG fragments.
 *
 * Provides a concrete `<use>` element implementation that returns {@see SvgVoid::USES} and provides linking, geometry,
 * presentation, and transform attribute methods.
 *
 * The `<use>` element references an existing element and renders it at the specified location.
 *
 * Key features.
 * - Enables referencing of internal and external SVG fragments.
 * - Supports linking and geometry attributes (`href`, `x`, `y`, `width`, `height`).
 * - Supports presentation attributes (`opacity`).
 * - Supports transform attribute (`transform`).
 * - Void element does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Svg, Symbol, Uses};
 *
 * echo Svg::tag()
 *     ->viewBox('0 0 16 16')
 *     ->content(
 *         Symbol::tag()->id('icon-check')->viewBox('0 0 16 16')->content('<path d="M2 8l4 4 8-8" />').
 *         PHP_EOL,
 *         Uses::tag()->href('#icon-check')->x(0)->y(0)->width(16)->height(16),
 *     )->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/use
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Uses extends BaseVoid
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
     * $element->href('#symbol');
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
     * Returns the tag enumeration for the `<use>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<use>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgVoid::USES;
    }
}
