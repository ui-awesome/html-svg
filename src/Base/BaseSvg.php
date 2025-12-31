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
use UIAwesome\Html\Attribute\Media\{HasHeight, HasWidth};
use UIAwesome\Html\Core\Element\BaseBlock;
use UIAwesome\Html\Core\Html;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Svg\Attribute\{
    HasFill,
    HasFillOpacity,
    HasOpacity,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeWidth, HasTransform,
};
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\SvgProperty;

use function file_get_contents;
use function is_string;

/**
 * Base class for constructing `<svg>` elements according to the SVG 2 specification.
 *
 * Provides a standards-compliant, extensible foundation for SVG container rendering, supporting SVG attributes, content
 * management, and attribute immutability.
 *
 * Intended for use in components and tags that require dynamic or programmatic manipulation of SVG container elements,
 * supporting advanced rendering scenarios and consistent API design.
 *
 * Key features:
 * - Automatically extracts the `title` attribute and renders it as a `<title>` tag (first child), ensuring
 *   compatibility with screen readers.
 * - Enforces standards-compliant handling of the `<svg>` element as defined by the SVG 2 specification.
 * - Immutable API for attribute and content assignment.
 * - Implements the core logic for SVG container construction and file-based SVG injection.
 * - Integrates SVG attribute management.
 * - Supports extensibility for custom SVG element implementations.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg
 * {@see BaseBlock} for the base block-level implementation.
 * {@see SvgProperty} for supported SVG attributes.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
abstract class BaseSvg extends BaseBlock implements Stringable
{
    use HasFill;
    use HasFillOpacity;
    use HasHeight;
    use HasOpacity;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeWidth;
    use HasTransform;
    use HasWidth;

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
     * Svg::tag()->filePath('/path/to/icon.svg');
     * ```
     */
    public function filePath(string $value): static
    {
        $new = clone $this;
        $new->filePath = $value;

        return $new;
    }

    /**
     * Overrides the attribute retrieval to filter out the 'title' attribute.
     *
     * This ensures 'title' is never rendered as a standard SVG attribute, without modifying the internal state of the
     * object.
     *
     * Usage example:
     * ```php
     * $svg->getAttributes();
     * ```
     */
    public function getAttributes(): array
    {
        $attributes = parent::getAttributes();

        unset($attributes['title']);

        return $attributes;
    }

    /**
     * Retrieves the content of the SVG element, injecting accessibility tags if defined.
     *
     * Overrides the base implementation to intercept the `title` attribute. If present, it creates a `<title>` HTML
     * element and prepends it to the content, ensuring proper accessibility for manually constructed SVGs.
     *
     * @return string Combined content string with the title injected.
     *
     * Usage example:
     * ```php
     * $svg->getContent();
     * ```
     */
    public function getContent(): string
    {
        $content = '';
        $titleAttribute = $this->getTitleAttribute();

        if ($titleAttribute !== '') {
            $content = Html::element(SvgProperty::TITLE, $this->getTitleAttribute(), []) . PHP_EOL;
        }

        return $content . parent::getContent();
    }

    /**
     * Sets the `preserveAspectRatio` attribute for the SVG element.
     *
     * Creates a new instance with the specified preserve aspect ratio value, supporting explicit assignment according
     * to the HTML specification for SVG attributes.
     *
     * @param string|null $value Aspect ratio preservation value.
     *
     * @return static New instance with the updated `preserveAspectRatio` attribute.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     *
     * Usage example:
     * ```php
     * Svg::tag()->preserveAspectRatio('xMidYMid meet');
     * ```
     */
    public function preserveAspectRatio(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::PRESERVE_ASPECT_RATIO, $value);
    }

    /**
     * Sets the `viewBox` attribute for the SVG element.
     *
     * Creates a new instance with the specified view box value, supporting explicit assignment according to the HTML
     * specification for SVG attributes.
     *
     * @param string|null $value ViewBox value (for example, '0 0 100 100').
     *
     * @return static New instance with the updated `viewBox` attribute.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#ViewBoxAttribute
     *
     * Usage example:
     * ```php
     * Svg::tag()->viewBox('0 0 100 100');
     * ```
     */
    public function viewBox(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::VIEW_BOX, $value);
    }

    /**
     * Sets the `x` attribute for the SVG element.
     *
     * Creates a new instance with the specified x coordinate value, supporting explicit assignment according to the
     * HTML specification for SVG attributes.
     *
     * @param string|null $value X coordinate value.
     *
     * @return static New instance with the updated `x` attribute.
     *
     * @link https://svgwg.org/svg2-draft/geometry.html#XProperty
     *
     * Usage example:
     * ```php
     * Svg::tag()->x('10');
     * ```
     */
    public function x(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::X, $value);
    }

    /**
     * Sets the `xmlns` attribute for the SVG element.
     *
     * Creates a new instance with the specified XML namespace URI, supporting explicit assignment according to the HTML
     * specification for SVG attributes.
     *
     * The `xmlns` attribute is required only on the outermost `<svg>` element in SVG documents or when embedding SVG in
     * XML.
     *
     * @param string|null $value XML namespace URI.
     *
     * @return static New instance with the updated `xmlns` attribute.
     *
     * @link https://svgwg.org/svg2-draft/struct.html#Namespace
     *
     * Usage example:
     * ```php
     * $svg = (new MySvg())->xmlns('http://www.w3.org/2000/svg');
     * ```
     */
    public function xmlns(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::XMLNS, $value);
    }

    /**
     * Sets the `y` attribute for the SVG element.
     *
     * Creates a new instance with the specified y coordinate value, supporting explicit assignment according to the
     * HTML specification for SVG attributes.
     *
     * @param string|null $value Y coordinate value.
     *
     * @return static New instance with the updated `y` attribute.
     *
     * @link https://svgwg.org/svg2-draft/geometry.html#YProperty
     *
     * Usage example:
     * ```php
     * $svg = (new MySvg())->y('20');
     * ```
     */
    public function y(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::Y, $value);
    }

    /**
     * Validates that either content or file path is provided before rendering.
     *
     * @throws InvalidArgumentException if both content and file path are empty.
     *
     * @return bool Whether rendering should proceed.
     */
    protected function beforeRun(): bool
    {
        if ($this->filePath === '' && $this->content === '') {
            throw new InvalidArgumentException(
                Message::CONTENT_AND_FILEPATH_CANNOT_BE_BOTH_EMPTY->getMessage(),
            );
        }

        return parent::beforeRun();
    }

    /**
     * Renders the SVG element.
     *
     * @return string Rendered SVG markup.
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
     * Retrieves and validates the `title` attribute from the attributes array.
     *
     * @throws InvalidArgumentException if the title attribute is not a string or `null`.
     *
     * @return string Title content, or an empty string if not set.
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
     * Renders the SVG markup from a file, injecting attributes and optional title content.
     *
     * @throws RuntimeException if SVG file loading or sanitization fails.
     *
     * @return false|string Rendered SVG markup, or `false` on failure.
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

        if ($titleAttribute !== '' && ($titleNode = $svg->createElement('title', $titleAttribute)) !== false) {
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
