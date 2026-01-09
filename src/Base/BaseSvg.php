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
use UIAwesome\Html\Attribute\Element\{HasHeight, HasWidth};
use UIAwesome\Html\Core\Element\BaseBlock;
use UIAwesome\Html\Core\Html;
use UIAwesome\Html\Helper\{Attributes, Enum};
use UIAwesome\Html\Svg\Attribute\{
    HasFill,
    HasFillOpacity,
    HasFillRule,
    HasOpacity,
    HasPreserveAspectRatio,
    HasStroke,
    HasStrokeDashArray,
    HasStrokeLineCap,
    HasStrokeLineJoin,
    HasStrokeMiterlimit,
    HasStrokeOpacity,
    HasStrokeWidth,
    HasTransform,
    HasX,
    HasY,
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
    use HasFillRule;
    use HasHeight;
    use HasOpacity;
    use HasPreserveAspectRatio;
    use HasStroke;
    use HasStrokeDashArray;
    use HasStrokeLineCap;
    use HasStrokeLineJoin;
    use HasStrokeMiterlimit;
    use HasStrokeOpacity;
    use HasStrokeWidth;
    use HasTransform;
    use HasWidth;
    use HasX;
    use HasY;

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
     * Overrides the attribute retrieval to filter out the 'title' attribute.
     *
     * This ensures 'title' is never rendered as a standard SVG attribute, without modifying the internal state of the
     * object.
     *
     * @return array Filtered attributes array without 'title'.
     *
     * @phpstan-return mixed[]
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
     * Retrieves the content of the SVG element, injecting accessibility tags if defined.
     *
     * Overrides the base implementation to intercept the `title` attribute. If present, it creates a `<title>` HTML
     * element and prepends it to the content, ensuring proper accessibility for manually constructed SVGs.
     *
     * @return string Combined content string with the title injected.
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
            $content = Html::element(SvgProperty::TITLE, $this->getTitleAttribute(), []) . PHP_EOL;
        }

        return $content . parent::getContent();
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
     * $element->viewBox('0 0 100 100');
     * ```
     */
    public function viewBox(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::VIEW_BOX, $value);
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
     * $element->xmlns('http://www.w3.org/2000/svg');
     * ```
     */
    public function xmlns(string|null $value): static
    {
        return $this->addAttribute(SvgProperty::XMLNS, $value);
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
        if ($this->filePath === '' && $this->content === '') {
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
