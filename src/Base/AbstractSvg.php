<?php

declare(strict_types=1);

namespace UIAwesome\Html\Graphic\Base;

use DOMDocument;
use DOMElement;
use enshrined\svgSanitize\Sanitizer;
use PHPForge\Widget\Element;
use UIAwesome\Html\{
    Attribute\HasClass,
    Attribute\HasHeight,
    Attribute\HasId,
    Attribute\HasLang,
    Attribute\HasTitle,
    Attribute\HasWidth,
    Concern\HasAttributes,
    Concern\HasContent,
    Core\HTMLBuilder,
    Interop\RenderInterface
};

use function file_get_contents;

/**
 * Provides a foundation for creating HTML `svg` elements with various attributes and content.
 */
abstract class AbstractSvg extends Element implements RenderInterface
{
    use HasAttributes;
    use HasClass;
    use HasContent;
    use HasHeight;
    use HasId;
    use HasLang;
    use HasTitle;
    use HasWidth;

    private string $filePath = '';

    /**
     * Returns a new instance with the file path of the SVG.
     *
     * @param string $value The file path.
     */
    public function filePath(string $value): static
    {
        $new = clone $this;
        $new->filePath = $value;

        return $new;
    }

    /**
     * Returns a new instance with the fill attribute of the SVG.
     *
     * @param string $value The fill value.
     */
    public function fill(string $value): static
    {
        $new = clone $this;
        $new->attributes['fill'] = $value;

        return $new;
    }

    /**
     * Returns a new instance with the stroke attribute of the SVG.
     *
     * @param string $value The stroke value.
     */
    public function stroke(string $value): static
    {
        $new = clone $this;
        $new->attributes['stroke'] = $value;

        return $new;
    }

    /**
     * Returns a new instance with the viewBox attribute of the SVG.
     *
     * @param string $value The viewBox value.
     */
    public function viewBox(string $value): static
    {
        $new = clone $this;
        $new->attributes['viewBox'] = $value;

        return $new;
    }

    /**
     * Returns a new instance with the xmlns attribute of the SVG.
     *
     * @param string $value The xmlns value.
     */
    public function xmlns(string $value): static
    {
        $new = clone $this;
        $new->attributes['xmlns'] = $value;

        return $new;
    }

    /**
     * Validates the file path and content before running the widget.
     *
     * @throws \InvalidArgumentException If both a file path and content are empty.
     *
     * @return bool Whether the widget should be executed.
     */
    protected function beforeRun(): bool
    {
        if ($this->filePath === '' && $this->content === '') {
            throw new \InvalidArgumentException(
                'File path and content cannot be empty at the same time for SVG widget.'
            );
        }

        return parent::beforeRun();
    }

    /**
     * Renders the SVG widget.
     *
     * @return string The rendered SVG.
     */
    protected function run(): string
    {
        return match ($this->content) {
            '' => $this->renderSvg(),
            default => HTMLBuilder::createTag('svg', PHP_EOL . $this->content . PHP_EOL, $this->attributes),
        };
    }

    /**
     * Loads the SVG file and returns the SVG element.
     *
     * @param DOMDocument $svg The DOMDocument instance.
     *
     * @throws \RuntimeException If failed to load the SVG file.
     *
     * @return DOMElement The SVG element.
     */
    private function loadSvgFile(DOMDocument $svg): DOMElement
    {
        $sanitizer = new Sanitizer();

        $fileSvg = @file_get_contents($this->filePath);

        if ($fileSvg === false) {
            throw new \RuntimeException('Failed to read SVG file: ' . $this->filePath);
        }

        $cleanedSvg = $sanitizer->sanitize($fileSvg);

        if ($cleanedSvg === false || $cleanedSvg === '') {
            throw new \RuntimeException('Failed to sanitize SVG file: ' . $this->filePath);
        }

        $svg->loadXML($cleanedSvg, LIBXML_NOBLANKS);

        return $svg->getElementsByTagName('svg')->item(0);
    }

    /**
     * Renders the SVG element with attributes.
     *
     * @return string The rendered SVG.
     */
    private function renderSvg(): string
    {
        /** @psalm-var array<string, mixed> $attributes */
        $attributes = $this->attributes;

        $svg = new DOMDocument();

        $renderedSvg = $this->loadSvgFile($svg);

        /** @psalm-var mixed $value */
        foreach ($attributes as $name => $value) {
            $renderedSvg->setAttribute($name, (string) $value);
        }

        return $svg->saveXML($renderedSvg);
    }
}
