<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use UIAwesome\Html\Core\Element\BaseVoid;
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgVoid;
use UIAwesome\Html\Svg\Values\SvgAttribute;

use function is_string;
use function str_ends_with;

/**
 * Represents the SVG `<stop>` element for defining gradient stop positions and colors.
 *
 * Provides a concrete `<stop>` element implementation that returns {@see SvgVoid::STOP} and provides stop attribute
 * methods.
 *
 * The `<stop>` element defines a color stop for gradients such as `<linearGradient>` and `<radialGradient>`.
 *
 * Key features.
 * - Supports stop attributes (`offset`, `stop-color`, `stop-opacity`).
 * - Void element. Does not accept child elements.
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\Stop;
 *
 * echo Stop::tag()
 *     ->offset('50%')
 *     ->stopColor('currentColor')
 *     ->stopOpacity(0.75)
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/stop
 * {@see BaseVoid} for the base implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Stop extends BaseVoid
{
    /**
     * Sets the SVG `offset` attribute for the element.
     *
     * Creates a new instance with the specified gradient stop offset value for the rendered element.
     *
     * @param float|int|string|null $value Offset value (for example, '0.25', '50%', or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range ('0'-'1', or '0'-'100%') and not
     * `null`.
     *
     * @return static New instance with the updated `offset` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#StopElementOffsetAttribute
     *
     * Usage example:
     * ```php
     * $stop->offset(0.25);
     * $stop->offset('50%');
     * $stop->offset(null);
     * ```
     */
    public function offset(float|int|string|null $value): static
    {
        if ($value !== null && Validator::offsetLike($value) === false) {
            $max = (is_string($value) && str_ends_with($value, '%')) ? 100 : 1;

            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, $max),
            );
        }

        return $this->addAttribute(SvgAttribute::OFFSET, $value);
    }

    /**
     * Sets the SVG `stop-color` attribute for the element.
     *
     * Creates a new instance with the specified gradient stop color value for the rendered element.
     *
     * @param string|null $value Stop color value (for example, '#ff0000', 'currentColor', or `null` to unset).
     *
     * @return static New instance with the updated `stop-color` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#StopColorProperty
     *
     * Usage example:
     * ```php
     * $stop->stopColor('#ff0000');
     * $stop->stopColor('currentColor');
     * $stop->stopColor(null);
     * ```
     */
    public function stopColor(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STOP_COLOR, $value);
    }

    /**
     * Sets the SVG `stop-opacity` attribute for the element.
     *
     * Creates a new instance with the specified gradient stop opacity value for the rendered element.
     *
     * @param float|int|string|null $value Stop opacity value (for example, '0.5' or `null` to unset).
     *
     * @throws InvalidArgumentException If the value is outside the allowed range ('0'-'1') and not `null`.
     *
     * @return static New instance with the updated `stop-opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/pservers.html#StopOpacityProperty
     *
     * Usage example:
     * ```php
     * $stop->stopOpacity(0.5);
     * $stop->stopOpacity('0.75');
     * $stop->stopOpacity(null);
     * ```
     */
    public function stopOpacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::STOP_OPACITY, $value);
    }

    /**
     * Returns the tag enumeration for the `<stop>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<stop>`.
     *
     * {@see SvgVoid} for valid SVG void-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgVoid::STOP;
    }
}
