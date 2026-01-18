<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasDTest}.
 *
 * Provides representative input/output pairs for testing the `d` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DProvider
{
    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'M10 10 H 90 V 90 H 10 Z',
                ['d' => 'M0 0 L 10 10'],
                'M10 10 H 90 V 90 H 10 Z',
                ' d="M10 10 H 90 V 90 H 10 Z"',
                "Should return new 'd' after replacing the existing 'd' attribute.",
            ],
            'string path data' => [
                'M10 10 H 90 V 90 H 10 Z',
                [],
                'M10 10 H 90 V 90 H 10 Z',
                ' d="M10 10 H 90 V 90 H 10 Z"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['d' => 'M10 10 H 90 V 90 H 10 Z'],
                '',
                '',
                "Should unset the 'd' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
