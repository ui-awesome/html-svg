<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Stub;

use UIAwesome\Html\Core\Base\BaseTag;
use UIAwesome\Html\Core\Provider\ThemeProviderInterface;
use UIAwesome\Html\Svg\Svg;

/**
 * Stub theme provider for tests.
 *
 * Returns deterministic theme attributes for tag instances to verify theme application behavior.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DefaultThemeProvider implements ThemeProviderInterface
{
    /**
     * @phpstan-return mixed[]
     */
    public function apply(BaseTag $tag, string $theme): array
    {
        if ($tag instanceof Svg) {
            return match ($theme) {
                'default' => ['class' => 'tag-default'],
                'primary' => ['class' => 'tag-primary'],
                'secondary' => ['class' => 'tag-secondary'],
                default => [],
            };
        }

        return match ($theme) {
            'highlight' => ['style' => 'background-color: yellow;'],
            'muted' => ['class' => 'text-muted'],
            default => [],
        };
    }
}
