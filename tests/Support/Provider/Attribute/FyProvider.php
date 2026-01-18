<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFyTest}.
 *
 * Provides representative input/output pairs for testing the `fy` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FyProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
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
            'float' => [
                50.5,
                [],
                50.5,
                ' fy="50.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                100,
                ' fy="100"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                75,
                ['fy' => 50],
                75,
                ' fy="75"',
                "Should return new 'fy' after replacing the existing 'fy' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' fy="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' fy="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fy' => 100],
                '',
                '',
                "Should unset the 'fy' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
