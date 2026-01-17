<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Stub;

use UIAwesome\Html\Core\Base\BaseTag;
use UIAwesome\Html\Core\Provider\DefaultsProviderInterface;
use UIAwesome\Html\Interop\BlockInterface;

/**
 * Default configuration provider stub for tests.
 *
 * Supplies an associative array of default options used when configuring and rendering tag instances.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DefaultProvider implements DefaultsProviderInterface
{
    /**
     * @phpstan-return mixed[]
     */
    public function getDefaults(BaseTag $tag): array
    {
        return match (true) {
            $tag instanceof BlockInterface => [
                'class' => 'default-class',
            ],
            default => [
                'class' => 'default-class',
                'title' => 'default-title',
            ],
        };
    }
}
