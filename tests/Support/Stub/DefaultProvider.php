<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Stub;

use UIAwesome\Html\Core\Base\BaseTag;
use UIAwesome\Html\Core\Provider\DefaultsProviderInterface;

/**
 * Stub defaults provider for tests.
 *
 * Returns deterministic default attributes for tag instances to verify configuration precedence and rendering.
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
        return [
            'class' => 'default-class',
            'title' => 'default-title',
        ];
    }
}
