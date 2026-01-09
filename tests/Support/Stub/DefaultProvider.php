<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Stub;

use UIAwesome\Html\Core\Base\BaseTag;
use UIAwesome\Html\Core\Provider\DefaultsProviderInterface;
use UIAwesome\Html\Interop\BlockInterface;

/**
 * Provides default configuration values for tag instances in HTML helper and UI component testing.
 *
 * Supplies a standardized associative array of default options for use in scenarios involving tag configuration,
 * attribute generation, and component rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DefaultProvider implements DefaultsProviderInterface
{
    /**
     * Returns configuration defaults for the given tag instance.
     *
     * Provides a cookbook-style associative array of default values for the specified tag, supporting extensible and
     * consistent tag configuration across the system.
     *
     * @param BaseTag $tag Tag instance being configured.
     *
     * @return array Cookbook-style configuration array.
     *
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
