<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Stub;

use BackedEnum;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Tag\SvgBlock;

/**
 * Test stub exposing protected SVG block tag hooks.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class InspectableSvgBlockTag extends BaseSvgBlockTag
{
    /**
     * Exposes the inherited begin state for base class tests.
     */
    public function beginExecuted(): bool
    {
        return $this->isBeginExecuted();
    }

    /**
     * Returns the tag enumeration for the test block element.
     *
     * @return BackedEnum Tag enumeration instance for `<defs>`.
     */
    protected function getTag(): BackedEnum
    {
        return SvgBlock::DEFS;
    }

    /**
     * Returns a custom opening tag to verify hook dispatch.
     *
     * @return string Opening tag marker.
     */
    protected function runBegin(): string
    {
        return '<custom-begin>';
    }
}
