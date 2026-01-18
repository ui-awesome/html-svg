<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasPointsTest}.
 *
 * Provides representative input/output pairs for testing the `points` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PointsProvider
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
                '0,0 10,10 20,0',
                ['points' => '0,0 0,10'],
                '0,0 10,10 20,0',
                ' points="0,0 10,10 20,0"',
                "Should return new 'points' after replacing the existing 'points' attribute.",
            ],
            'string list of points' => [
                '0,100 50,25 50,75 100,0',
                [],
                '0,100 50,25 50,75 100,0',
                ' points="0,100 50,25 50,75 100,0"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['points' => '0,0 10,10'],
                '',
                '',
                "Should unset the 'points' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
