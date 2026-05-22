<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg;

use BackedEnum;
use InvalidArgumentException;
use UIAwesome\Html\Svg\Base\BaseSvg;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\SvgBlock;

use function dirname;
use function preg_match;

/**
 * Represents the SVG `<svg>` (svg) element for scalable vector graphics containers.
 *
 * Provides a concrete implementation of the SVG `<svg>` container element that returns {@see SvgBlock::SVG} and
 * inherits attribute methods from {@see Base\BaseSvg} for viewport, paint, and transform attributes.
 *
 * The `<svg>` element defines a new coordinate system and viewport for SVG graphics. It is used as the outermost
 * element of SVG documents, or to embed SVG fragments within HTML or SVG documents.
 *
 * Key features.
 * - Container element accepts child elements.
 * - Moves the global `title` attribute into a `<title>` child when present.
 * - Supports file-based SVG injection via `filePath()` with sanitization and validation.
 * - Supports geometry and viewport attributes (`x`, `y`, `width`, `height`, `viewBox`).
 * - Supports paint and presentation attributes (`fill`, `stroke`, `opacity`, etc.).
 * - Supports transform and aspect ratio attributes (`transform`, `preserveAspectRatio`).
 *
 * Usage example:
 * ```php
 * use UIAwesome\Html\Svg\{Circle, Svg};
 *
 * echo Svg::tag()
 *     ->xmlns('http://www.w3.org/2000/svg')
 *     ->viewBox('0 0 100 100')
 *     ->title('Circle example')
 *     ->content(Circle::tag()->cx(50)->cy(50)->r(40)->fill('currentColor'))
 *     ->render();
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Element/svg
 * {@see Base\BaseSvg} for the base implementation.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Svg extends BaseSvg
{
    /**
     * Returns a new {@see Svg} instance configured to render an icon bundled with the package.
     *
     * Accepts a reference of the form `Collection:name` (for example, `Bootstrap5:globe`). Icons resolve against the
     * path `assets/icons/{Collection}/{name}.svg` shipped with this package. Chain additional fluent methods (width,
     * height, fill, ...) before rendering.
     *
     * Usage example:
     * ```php
     * echo \UIAwesome\Html\Svg\Svg::icon('Bootstrap5:globe')
     *     ->width(32)
     *     ->height(32)
     *     ->fill('currentColor')
     *     ->render();
     * ```
     *
     * @param string $reference Icon reference in the form `Collection:name`. Each segment must match `[A-Za-z0-9_-]+`.
     *
     * @throws InvalidArgumentException if {@see $reference} does not match the `Collection:name` format.
     *
     * @return self New instance with the resolved SVG file path configured.
     */
    public static function icon(string $reference): self
    {
        return self::tag()->filePath(self::iconPath($reference));
    }

    /**
     * Resolves an icon reference to the absolute file path of the SVG asset shipped with this package.
     *
     * Accepts a reference of the form `Collection:name` (for example, `Bootstrap5:globe`). Useful when the file path is
     * needed without instantiating a {@see Svg} (for example, when configuring {@see iconFilePath()} on another
     * component).
     *
     * Usage example:
     * ```php
     * $component->iconFilePath(\UIAwesome\Html\Svg\Svg::iconPath('Bootstrap5:globe'));
     * ```
     *
     * @param string $reference Icon reference in the form `Collection:name`. Each segment must match `[A-Za-z0-9_-]+`;
     * references containing path separators, `..`, or empty segments are rejected to keep the resolved path inside the
     * bundled `assets/icons` directory.
     *
     * @throws InvalidArgumentException if `$reference` does not match the `Collection:name` format.
     *
     * @return string Absolute path to the resolved SVG file.
     */
    public static function iconPath(string $reference): string
    {
        if (preg_match('/^(?<collection>[A-Za-z0-9_-]+):(?<name>[A-Za-z0-9_-]+)$/', $reference, $matches) !== 1) {
            throw new InvalidArgumentException(
                Message::ICON_REFERENCE_MUST_BE_COLLECTION_NAME->getMessage($reference),
            );
        }

        return dirname(__DIR__) . '/assets/icons/' . $matches['collection'] . '/' . $matches['name'] . '.svg';
    }

    /**
     * Returns the tag enumeration for the `<svg>` element.
     *
     * @return BackedEnum Tag enumeration instance for `<svg>`.
     *
     * {@see SvgBlock} for valid SVG block-level tags.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::SVG;
    }
}
