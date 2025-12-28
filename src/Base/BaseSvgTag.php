<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Base;

use UIAwesome\Html\Core\Attribute\{
    HasAria,
    HasClass,
    HasData,
    HasEvents,
    HasId,
    HasLang,
    HasRole,
    HasStyle,
    HasTabindex,
};
use UIAwesome\Html\Core\Base\BaseTag;
use UIAwesome\Html\Core\Html;
use UIAwesome\Html\Core\Mixin\{HasAttributes, HasContent};
use UIAwesome\Html\Core\Tag\BlockInterface;

use function preg_replace;

/**
 * Base class for constructing block-level SVG tag elements according to the HTML specification.
 *
 * Provides a standards-compliant, extensible foundation for SVG tag rendering, supporting attribute management,
 * content handling, and output normalization for block elements.
 *
 * Intended for use in components and tags that require dynamic or programmatic manipulation of SVG block elements,
 * ensuring consistent rendering and API design.
 *
 * Key features:
 * - Implements content injection and output normalization for clean HTML structure.
 * - Integrates attribute, class, data, event, and style management for SVG block tags.
 * - Provides an abstract contract for specifying the concrete block tag via `getTag()` method.
 * - Supports `aria-*`, `language`, `role`, and `tabindex` attribute for accessibility and semantics.
 *
 * {@see BaseTag} for the base tag-level implementation.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
abstract class BaseSvgTag extends BaseTag
{
    use HasAria;
    use HasAttributes;
    use HasClass;
    use HasContent;
    use HasData;
    use HasEvents;
    use HasId;
    use HasLang;
    use HasRole;
    use HasStyle;
    use HasTabindex;

    /**
     * Returns the tag instance representing the block element.
     *
     * Must be implemented by subclasses to specify the concrete block tag for rendering.
     *
     * @return BlockInterface Tag instance for the block element.
     *
     * Usage example:
     * ```php
     * public function getTag(): Block|Lists|Root|Table
     * {
     *     return Block::DIV;
     * }
     * ```
     */
    abstract protected function getTag(): BlockInterface;

    /**
     * Cleans up the output after rendering the block element.
     *
     * Removes excessive consecutive newlines from the rendered output to ensure clean HTML structure.
     *
     * @param string $result Rendered HTML output.
     *
     * @return string Cleaned HTML output with excessive newlines removed.
     *
     * Usage example:
     * ```php
     * $block->afterRun($html);
     * ```
     */
    protected function afterRun(string $result): string
    {
        $normalizeOutput = preg_replace("/\n{2,}/", "\n", $result) ?? '';

        return parent::afterRun($normalizeOutput);
    }

    /**
     * Renders the block element.
     *
     * If the begin tag was not executed, renders the complete tag with content and attributes; otherwise, returns the
     * closing tag for the block element.
     *
     * @return string Rendered HTML for the block element.
     *
     * Usage example:
     * ```php
     * $block->run();
     * ```
     */
    protected function run(): string
    {
        if ($this->isBeginExecuted() === false) {
            return Html::element($this->getTag(), $this->getContent(), $this->getAttributes());
        }

        return Html::end($this->getTag());
    }

    /**
     * Begins rendering the block element.
     *
     * Returns the opening tag for the block element with the current attributes.
     *
     * @return string Opening HTML tag for the block element.
     *
     * Usage example:
     * ```php
     * $block->runBegin();
     * // Output: <div class="example-class" id="example-id">
     * ```
     */
    protected function runBegin(): string
    {
        return Html::begin($this->getTag(), $this->getAttributes());
    }
}
