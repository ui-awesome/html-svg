<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Base;

use DOMDocument;
use DOMElement;
use enshrined\svgSanitize\Sanitizer;
use Exception;
use InvalidArgumentException;
use RuntimeException;
use Stringable;
use UIAwesome\Html\Core\Element\BaseBlock;
use UIAwesome\Html\Core\Html;
use UIAwesome\Html\Helper\{Attributes, Enum, Validator};
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\{FillRule, PreserveAspectRatio, StrokeLineCap, StrokeLineJoin, SvgAttribute};
use UnitEnum;

use function file_get_contents;
use function is_string;

/**
 * Base class for constructing `<svg>` elements.
 *
 * Provides the shared implementation for SVG container rendering, including attribute handling, content management, and
 * immutable updates.
 *
 * Intended for SVG classes that need SVG container behavior with file-backed rendering and attribute processing.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Extensible for custom SVG element implementations.
 * - Immutable API for attribute and content assignment.
 * - Integrates SVG attribute management.
 * - Moves the global `title` attribute into a `<title>` child when present.
 * - Supports file-based SVG injection.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg
 * {@see BaseBlock} for the base block-level implementation.
 * {@see SvgAttribute} for supported SVG attributes.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
abstract class BaseSvg extends BaseBlock implements Stringable
{
    /**
     * Path to the SVG file to be loaded and rendered.
     */
    private string $filePath = '';

    /**
     * Sets the file path for the SVG file to be rendered.
     *
     * Creates a new instance with the specified file path property value, supporting explicit assignment of SVG file
     * paths.
     *
     * @param string $value Path to the SVG file.
     *
     * @return static New instance with the updated `filePath` property.
     *
     * Usage example:
     * ```php
     * $element->filePath('/path/to/icon.svg');
     * ```
     */
    public function filePath(string $value): static
    {
        $new = clone $this;
        $new->filePath = $value;

        return $new;
    }

    /**
     * Sets the SVG `fill` attribute for the element.
     *
     * Creates a new instance with the specified fill value for the rendered element.
     *
     * @param string|null $value Fill value (for example, 'red', 'url(#gradient1)', or `null` to unset).
     *
     * @return static New instance with the updated `fill` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillProperties
     *
     * Usage example:
     * ```php
     * $element->fill('red');
     * $element->fill('url(#gradient1)');
     * $element->fill(null);
     * ```
     */
    public function fill(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::FILL, $value);
    }

    /**
     * Sets SVG `fill-opacity` attribute for the element.
     *
     * Creates a new instance with the specified fill opacity value for the rendered element.
     *
     * @param float|int|string|null $value Fill opacity value (for example, '0.5', 0.5, or `null` to unset).
     *
     * @throws InvalidArgumentException if the value is outside the allowed range ('0'-'1') and not `null`.
     *
     * @return static New instance with the updated `fill-opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#FillOpacity
     *
     * Usage example:
     * ```php
     * $element->fillOpacity('0.5');
     * $element->fillOpacity(null);
     * ```
     */
    public function fillOpacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::FILL_OPACITY, $value);
    }

    /**
     * Sets SVG `fill-rule` attribute for the element.
     *
     * Creates a new instance with the specified fill rule value for the rendered element.
     *
     * @param FillRule|string|null $value Fill rule value to set for the element. Accepts 'nonzero', 'evenodd',
     * {@see FillRule} enum, or `null` to unset.
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see FillRule} enum or string.
     *
     * @return static New instance with the updated `fill-rule` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#WindingRule
     * {@see FillRule} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->fillRule('nonzero');
     * $element->fillRule(FillRule::EVENODD);
     * $element->fillRule(null);
     * ```
     */
    public function fillRule(FillRule|string|null $value): static
    {
        Validator::oneOf($value, FillRule::cases(), SvgAttribute::FILL_RULE);

        return $this->addAttribute(SvgAttribute::FILL_RULE, $value);
    }

    /**
     * Overrides the attribute retrieval to filter out the `title` attribute.
     *
     * This ensures `title` attribute is never rendered as a standard SVG attribute, without modifying the internal
     * state of the object.
     *
     * @return mixed[] Filtered attributes array without `title` attribute.
     *
     * Usage example:
     * ```php
     * $element->getAttributes();
     * ```
     */
    public function getAttributes(): array
    {
        $attributes = parent::getAttributes();

        unset($attributes['title']);

        return $attributes;
    }

    /**
     * Retrieves the content of the SVG element, injecting a `<title>` element when defined.
     *
     * Overrides the base implementation to intercept the `title` attribute. If present, it creates a `<title>` element
     * and prepends it to the content before the remaining SVG content.
     *
     * @return string Combined content string with the `title` attribute injected.
     *
     * Usage example:
     * ```php
     * $element->getContent();
     * ```
     */
    public function getContent(): string
    {
        $content = '';

        $titleAttribute = $this->getTitleAttribute();

        if ($titleAttribute !== '') {
            $content = Html::element(SvgAttribute::TITLE, $this->getTitleAttribute(), []) . PHP_EOL;
        }

        return $content . parent::getContent();
    }

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
     * @param float|int|string|null $value Opacity value (for example, '0.5', '0.75', or `null` to unset).
     *
     * @throws InvalidArgumentException if the value is outside the allowed range ('0'-'1') and not `null`.
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
     * @throws InvalidArgumentException if the provided value is not a valid {@see PreserveAspectRatio} enum or string.
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
     * Sets the SVG `stroke` attribute for the element.
     *
     * Creates a new instance with the specified stroke value for the rendered element.
     *
     * @param string|null $value Stroke paint value (for example, 'black', 'url(#gradient1)', or `null` to unset).
     *
     * @return static New instance with the updated `stroke` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeProperty
     *
     * Usage example:
     * ```php
     * $element->stroke('black');
     * $element->stroke('url(#gradient1)');
     * $element->stroke(null);
     * ```
     */
    public function stroke(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE, $value);
    }

    /**
     * Sets the SVG `stroke-dasharray` attribute for the element.
     *
     * Creates a new instance with the specified dash array value for the rendered element.
     *
     * @param float|int|string|null $value Dash array value (for example, '5.3', '4', '5.3 2', or `null` to unset).
     *
     * @return static New instance with the updated `stroke-dasharray` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeDashing
     *
     * Usage example:
     * ```php
     * $element->strokeDashArray(5.3);
     * $element->strokeDashArray(4);
     * $element->strokeDashArray(null);
     * ```
     */
    public function strokeDashArray(float|int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE_DASHARRAY, $value);
    }

    /**
     * Sets the SVG `stroke-linecap` attribute for the element.
     *
     * Creates a new instance with the specified stroke line cap value for the rendered element.
     *
     * @param string|StrokeLineCap|null $value Stroke line cap style (for example, 'round', {@see StrokeLineCap} enum,
     * or `null` to unset).
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see StrokeLineCap} enum or string.
     *
     * @return static New instance with the updated `stroke-linecap` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineCaps
     * {@see StrokeLineCap} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->strokeLineCap('round');
     * $element->strokeLineCap(StrokeLineCap::SQUARE);
     * $element->strokeLineCap(null);
     * ```
     */
    public function strokeLineCap(string|StrokeLineCap|null $value): static
    {
        Validator::oneOf($value, StrokeLineCap::cases(), SvgAttribute::STROKE_LINECAP);

        return $this->addAttribute(SvgAttribute::STROKE_LINECAP, $value);
    }

    /**
     * Sets the SVG `stroke-linejoin` attribute for the element.
     *
     * @param string|StrokeLineJoin|null $value Stroke line join style (for example, 'miter', {@see StrokeLineJoin}
     * enum, or `null` to unset).
     *
     * @throws InvalidArgumentException if the provided value is not a valid {@see StrokeLineJoin} enum or string.
     *
     * @return static New instance with the updated `stroke-linejoin` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#LineJoin
     * {@see StrokeLineJoin} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->strokeLineJoin('miter');
     * $element->strokeLineJoin(StrokeLineJoin::ROUND);
     * $element->strokeLineJoin(null);
     * ```
     */
    public function strokeLineJoin(string|StrokeLineJoin|null $value): static
    {
        Validator::oneOf($value, StrokeLineJoin::cases(), SvgAttribute::STROKE_LINEJOIN);

        return $this->addAttribute(SvgAttribute::STROKE_LINEJOIN, $value);
    }

    /**
     * Sets SVG `stroke-miterlimit` attribute for the element.
     *
     * Creates a new instance with the specified stroke miter limit value for the rendered element.
     *
     * The `stroke-miterlimit` attribute controls the limit on the ratio of the miter length to the stroke width. When
     * the limit is exceeded, the join is converted from a miter to a bevel. The value must be a number '>= 1'.
     *
     * @param float|int|string|null $value Stroke miter limit value (for example, '4', '10', or `null` to unset).
     *
     * @throws InvalidArgumentException if value is not a number '>= 1' or `null`.
     *
     * @return static New instance with the updated `stroke-miterlimit` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeMiterlimitProperty
     *
     * Usage example:
     * ```php
     * $element->strokeMiterlimit(4);
     * $element->strokeMiterlimit(null);
     * ```
     */
    public function strokeMiterlimit(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
            );
        }

        return $this->addAttribute(SvgAttribute::STROKE_MITERLIMIT, $value);
    }

    /**
     * Sets SVG `stroke-opacity` attribute for the element.
     *
     * Creates a new instance with the specified stroke opacity value for the rendered element.
     *
     * @param float|int|string|null $value Stroke opacity value (for example, '0.8', '0.6', or `null` to unset).
     *
     * @throws InvalidArgumentException if the value is outside the allowed range ('0'-'1') and not `null`.
     *
     * @return static New instance with the updated `stroke-opacity` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeOpacityProperty
     *
     * Usage example:
     * ```php
     * $element->strokeOpacity(0.8);
     * $element->strokeOpacity('0.6');
     * $element->strokeOpacity(null);
     * ```
     */
    public function strokeOpacity(float|int|string|null $value): static
    {
        if ($value !== null && Validator::positiveLike($value, max: 1) === false) {
            throw new InvalidArgumentException(
                Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
            );
        }

        return $this->addAttribute(SvgAttribute::STROKE_OPACITY, $value);
    }

    /**
     * Sets the SVG `stroke-width` attribute for the element.
     *
     * Creates a new instance with the specified stroke width value for the rendered element.
     *
     * @param int|string|null $value Stroke width value (for example, '2', '1.5em', or `null` to unset).
     *
     * @return static New instance with the updated `stroke-width` attribute.
     *
     * @link https://www.w3.org/TR/SVG2/painting.html#StrokeWidth
     *
     * Usage example:
     * ```php
     * $element->strokeWidth(2);
     * $element->strokeWidth('1.5em');
     * $element->strokeWidth(null);
     * ```
     */
    public function strokeWidth(int|string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::STROKE_WIDTH, $value);
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
     * Sets the `xmlns` attribute for the SVG element.
     *
     * Creates a new instance with the specified XML namespace URI for the rendered `<svg>` element.
     *
     * The `xmlns` attribute is typically used on the outermost `<svg>` element.
     *
     * @param string|null $value XML namespace URI.
     *
     * @return static New instance with the updated `xmlns` attribute.
     *
     * @link https://svgwg.org/svg2-draft/struct.html#Namespace
     *
     * Usage example:
     * ```php
     * $element->xmlns('http://www.w3.org/2000/svg');
     * ```
     */
    public function xmlns(string|null $value): static
    {
        return $this->addAttribute(SvgAttribute::XMLNS, $value);
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
     * Pre-run validation for SVG rendering.
     *
     * Ensures at least one source of content is provided: either the `filePath` property or the internal `content`.
     *
     * @throws InvalidArgumentException if both `filePath` and `content` are empty.
     *
     * @return bool `true` when preconditions are satisfied and the parent pre-run succeeds.
     */
    protected function beforeRun(): bool
    {
        if ($this->isBeginExecuted() === false && $this->filePath === '' && $this->content === '') {
            throw new InvalidArgumentException(
                Message::CONTENT_AND_FILEPATH_CANNOT_BE_BOTH_EMPTY->getMessage(),
            );
        }

        return parent::beforeRun();
    }

    /**
     * Executes the rendering routine for the SVG element.
     *
     * If a `filePath` is configured the SVG content is loaded, sanitized, and injected into the current document. When
     * no `filePath` is provided the parent's run method is used.
     *
     * @return string Rendered SVG string or parent's result.
     */
    protected function run(): string
    {
        if ($this->filePath !== '') {
            $svg = $this->renderSvg();

            return $svg !== false ? $svg : '';
        }

        return parent::run();
    }

    /**
     * Extracts and validates the `title` attribute value.
     *
     * Normalizes the attribute using {@see Enum::normalizeValue} and ensures the value is either `null` or a string.
     *
     * @throws InvalidArgumentException if the `title` attribute exists but is not a string nor `null`.
     *
     * @return string Validated title value or empty string when absent.
     */
    private function getTitleAttribute(): string
    {
        if (isset($this->attributes['title'])) {
            $content = Enum::normalizeValue($this->attributes['title']);

            if ($content !== null && is_string($content) === false) {
                throw new InvalidArgumentException(
                    Message::TITLE_ATTRIBUTE_MUST_BE_STRING_OR_NULL->getMessage(),
                );
            }
        }

        return $content ?? '';
    }

    /**
     * Loads and sanitizes the SVG file, returning the root SVG DOM element.
     *
     * @param DOMDocument $svg DOMDocument instance for SVG parsing.
     *
     * @throws RuntimeException if the file cannot be read or sanitized.
     *
     * @return DOMElement|null Root SVG element, or `null` on failure.
     */
    private function loadSvgFile(DOMDocument $svg): DOMElement|null
    {
        $sanitizer = new Sanitizer();

        $fileSvg = @file_get_contents($this->filePath);

        if ($fileSvg === false) {
            throw new RuntimeException(
                Message::FAILED_TO_READ_FILE->getMessage($this->filePath),
            );
        }

        try {
            $cleanedSvg = $sanitizer->sanitize($fileSvg);
        } catch (Exception) {
            return null;
        }

        if ($cleanedSvg === false || $cleanedSvg === '') {
            throw new RuntimeException(
                Message::FAILED_TO_SANITIZE_SVG->getMessage($this->filePath),
            );
        }

        $svg->loadXML($cleanedSvg, LIBXML_NOBLANKS);

        return $svg->getElementsByTagName((string) $this->getTag()->value)->item(0);
    }

    /**
     * Renders the SVG by loading, sanitizing, and injecting normalized attributes and title.
     *
     * @return false|string Serialized SVG string on success or `false` when rendering failed.
     */
    private function renderSvg(): false|string
    {
        $svg = new DOMDocument();

        $renderedSvg = $this->loadSvgFile($svg);

        if ($renderedSvg === null) {
            return false;
        }

        $normalizedAttributes = Attributes::normalizeAttributes($this->attributes, false);

        $titleAttribute = $this->getTitleAttribute();

        if ($titleAttribute !== '') {
            $titleNode = $svg->createElement('title', $titleAttribute);

            if ($renderedSvg->firstChild !== null) {
                $renderedSvg->insertBefore($titleNode, $renderedSvg->firstChild);
            } else {
                $renderedSvg->appendChild($titleNode);
            }
        }

        foreach ($normalizedAttributes as $name => $value) {
            $attributeValue = $value === true ? $name : $value;

            if ($name !== 'title') {
                $renderedSvg->setAttribute($name, (string) $attributeValue);
            }
        }

        return $svg->saveXML($renderedSvg);
    }
}
