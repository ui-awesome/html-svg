<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Internal;

use UIAwesome\Html\Helper\Attributes;

use function is_bool;
use function str_starts_with;

/**
 * Serializes empty SVG primitives without HTML void-element syntax.
 *
 * @internal
 */
trait RendersEmptySvg
{
    /**
     * Renders a self-closing SVG element with XML-compatible attribute values.
     */
    protected function run(): string
    {
        $tag = $this->getTag()->value;

        $attributes = '';

        foreach (Attributes::normalizeAttributes($this->getAttributes()) as $name => $value) {
            // Keep helper normalization and escaping, but XML does not allow minimized boolean attributes.
            $value = is_bool($value) ? $name : $value;
            $quote = $name === 'style' || str_starts_with($value, '{') || str_starts_with($value, '[') ? "'" : '"';
            $attributes .= " {$name}={$quote}{$value}{$quote}";
        }

        return "<{$tag}{$attributes}/>";
    }
}
