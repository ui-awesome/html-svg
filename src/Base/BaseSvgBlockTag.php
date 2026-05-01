<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Base;

use BackedEnum;
use Fiber;
use LogicException;
use RuntimeException;
use stdClass;
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
use UIAwesome\Html\Core\Exception\Message;
use UIAwesome\Html\Core\Html;
use UIAwesome\Html\Mixin\{HasAttributes, HasContent};
use WeakMap;

use function array_key_last;
use function array_pop;
use function preg_replace;

/**
 * Base class for constructing block-level SVG tag elements.
 *
 * Provides a shared foundation for SVG tag rendering, including attribute handling, content handling, and output
 * normalization for block elements.
 *
 * Intended for SVG block tag classes that render block-level SVG elements via {@see Html} helpers.
 *
 * Key features.
 * - Abstract contract for specifying the block tag via {@see getTag()} method.
 * - Container element accepts child elements.
 * - Integrates attribute, class, data, event, and style management.
 * - Supports `aria-*`, `lang`, `role`, and `tabindex` attributes.
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
     * Tracks whether {@see begin()} was executed for this instance.
     */
    private bool $beginExecuted = false;

    /**
     * Stores the sentinel object for the main execution context.
     */
    private static stdClass|null $mainThread = null;

    /**
     * Stores per-context begin/end stacks.
     *
     * @phpstan-var WeakMap<object, static[]>|null
     */
    private static WeakMap|null $stack = null;

    /**
     * Returns the tag instance representing the block element.
     *
     * Must be implemented by subclasses to specify the concrete block tag for rendering.
     *
     * @return BackedEnum Tag instance for the block element.
     *
     * Usage example:
     * ```php
     * public function getTag(): BackedEnum
     * {
     *     return SvgBlock::DEFS;
     * }
     * ```
     */
    abstract protected function getTag(): BackedEnum;

    /**
     * Starts begin/end rendering for this instance.
     *
     * @return string Opening SVG tag string for the block element.
     */
    final public function begin(): string
    {
        $renderBegin = $this->runBegin();

        $stack = self::getContextStack();

        $stack[] = $this;

        self::getStackStorage()->offsetSet(self::getContextId(), $stack);

        $this->beginExecuted = true;

        return $renderBegin;
    }

    /**
     * Ends the most recent begin/end rendering block for the current class.
     *
     * @throws LogicException if no matching {@see begin()} call is found.
     * @throws RuntimeException if the tag class does not match the expected type.
     *
     * @return string Rendered SVG tag string.
     */
    final public static function end(): string
    {
        $key = self::getContextId();
        $stack = self::getContextStack();

        if ($stack === []) {
            throw new LogicException(
                Message::UNEXPECTED_END_CALL_NO_BEGIN->getMessage(static::class),
            );
        }

        $lastIndex = array_key_last($stack);

        /** @var static $tag */
        $tag = $stack[$lastIndex];

        $tagClass = $tag::class;

        if ($tagClass !== static::class) {
            throw new RuntimeException(
                Message::TAG_CLASS_MISMATCH_ON_END->getMessage($tagClass, static::class),
            );
        }

        array_pop($stack);

        $stackStorage = self::getStackStorage();

        if ($stack === []) {
            $stackStorage->offsetUnset($key);
        } else {
            $stackStorage->offsetSet($key, $stack);
        }

        try {
            return $tag->render();
        } finally {
            $tag->beginExecuted = false;
        }
    }

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
     * Indicates whether {@see begin()} was executed for this instance.
     *
     * @return bool `true` if {@see begin()} was executed, `false` otherwise.
     */
    protected function isBeginExecuted(): bool
    {
        return $this->beginExecuted;
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

    /**
     * Returns the identifier for the current execution context.
     *
     * @return Fiber<mixed, mixed, mixed, mixed>|stdClass Identifier for the current execution context, using Fiber if
     * available or a sentinel object for the main thread.
     */
    private static function getContextId(): Fiber|stdClass
    {
        return Fiber::getCurrent() ?? self::$mainThread ??= new stdClass();
    }

    /**
     * Returns the begin/end stack for the current execution context.
     *
     * @return array<array-key, static> Begin/end stack for the current execution context.
     */
    private static function getContextStack(): array
    {
        $stack = self::getStackStorage();

        $key = self::getContextId();

        if ($stack->offsetExists($key) === false) {
            $stack->offsetSet($key, []);
        }

        return $stack->offsetGet($key);
    }

    /**
     * Returns the initialized begin/end stack storage.
     *
     * @return WeakMap<object, static[]> Initialized begin/end stack storage for all execution contexts.
     */
    private static function getStackStorage(): WeakMap
    {
        self::$stack ??= new WeakMap();

        return self::$stack;
    }
}
