<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Base;

use UIAwesome\Html\Attribute\Global\{
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
use UIAwesome\Html\Interop\BlockInterface;
use UIAwesome\Html\Mixin\{HasAttributes, HasContent};

use function preg_replace;

/**
 * Base class for constructing block-level SVG tag elements according to the HTML specification.
 *
 * Provides a standards-compliant, extensible foundation for SVG tag rendering, supporting attribute management,
 * content handling, and output normalization for block elements.
 *
 * Intended for use in SVG tag and component classes that require dynamic or programmatic manipulation of SVG block
 * elements, ensuring consistent rendering and API design.
 *
 * Key features.
 * - Abstract contract for specifying the block tag via `getTag()` method.
 * - Container element accepts child elements.
 * - Integrates attribute, class, data, event, and style management.
 * - Supports `aria-*`, `lang`, `role`, and `tabindex` attributes for accessibility and semantics.
 * - Supports content injection and output normalization.
 *
 * {@see BaseTag} for the base tag-level implementation.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
abstract class BaseSvgBlockTag extends BaseTag
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
     * public function getTag(): BlockInterface
     * {
     *     return SvgBlock::DEFS;
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
     */
    protected function afterRun(string $result): string
    {
        $normalizeOutput = preg_replace("/\n{2,}/", "\n", $result) ?? '';

        return parent::afterRun($normalizeOutput);
    }

    /**
     * Executes the rendering routine for the SVG block-level element.
     *
     * @return string Rendered SVG string or parent's result.
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
     */
    protected function runBegin(): string
    {
        return Html::begin($this->getTag(), $this->getAttributes());
    }
}
